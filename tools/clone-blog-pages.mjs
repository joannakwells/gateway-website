import { mkdir, readFile, writeFile } from "node:fs/promises";
import { dirname, join } from "node:path";
import { fileURLToPath } from "node:url";

const root = fileURLToPath(new URL("..", import.meta.url));
const origin = "https://www.davidaustinroses.com";
const sourceFiles = [
  "index.html",
  "src/sections/header-group.html",
  "src/sections/footer-group.html",
  "src/sections/home/09-featured-articles-large.html",
  "src/sections/home/14-featured-articles.html"
];

const paths = new Set();

for (const file of sourceFiles) {
  const source = await readFile(join(root, file), "utf8");
  for (const match of source.matchAll(/href="(?:https:\/\/www\.davidaustinroses\.com)?(\/blogs\/[^"#?]+)"/g)) {
    paths.add(match[1].replace(/\/$/, ""));
  }
}

function localFileForPath(path) {
  return join(root, path.replace(/^\//, ""), "index.html");
}

function normalizeForLocal(html) {
  return html
    .replaceAll(`${origin}/blogs/`, "/blogs/")
    .replaceAll('href="/cdn/', `href="${origin}/cdn/`)
    .replaceAll('src="/cdn/', `src="${origin}/cdn/`)
    .replaceAll('href="/checkouts/', `href="${origin}/checkouts/`)
    .replaceAll('src="/checkouts/', `src="${origin}/checkouts/`);
}

const cloned = [];

for (const path of [...paths].sort()) {
  const url = `${origin}${path}`;
  console.log(`Fetching ${url}`);
  const response = await fetch(url, {
    headers: {
      "user-agent": "Mozilla/5.0 (compatible; DavidAustinLocalClone/1.0)"
    }
  });

  if (!response.ok) {
    throw new Error(`Failed to fetch ${url}: ${response.status} ${response.statusText}`);
  }

  const html = normalizeForLocal(await response.text());
  const file = localFileForPath(path);
  await mkdir(dirname(file), { recursive: true });
  await writeFile(file, html, "utf8");
  cloned.push(path);
}

console.log(`Cloned ${cloned.length} blog routes:`);
for (const path of cloned) {
  console.log(`- ${path}`);
}
