const products = [
  {
    name: "Gabriel Oak",
    color: "pink",
    form: "English shrub rose",
    scent: "Strong fruity fragrance",
    price: "$35.00",
    badge: "Best seller",
    image: "https://www.davidaustinroses.com/cdn/shop/files/GabrielOak_LowtherCastle_June25_134117_1.jpg?v=1777547511&width=900"
  },
  {
    name: "Darcey Bussell",
    color: "red",
    form: "Compact shrub rose",
    scent: "Light fruity fragrance",
    price: "$35.00",
    badge: "Rich color",
    image: "https://www.davidaustinroses.com/cdn/shop/files/Darcey_Bussell_RD0947_V2.jpg?v=1776239655&width=900"
  },
  {
    name: "Windermere",
    color: "white",
    form: "English shrub rose",
    scent: "Fresh citrus fragrance",
    price: "$35.00",
    badge: "Elegant",
    image: "https://www.davidaustinroses.com/cdn/shop/files/Windermere_sleepingfirefly.jpg?v=1776239513&width=900"
  },
  {
    name: "The Lady Gardener",
    color: "apricot",
    form: "English shrub rose",
    scent: "Tea fragrance",
    price: "$35.00",
    badge: "Fragrant",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/2_Rosa_Olivia_Rose_Austin_and_The_Lady_Gardener__15A4467_V2_391ddc4c-faec-4880-bcc6-7f1f04209c7d.jpg?v=1775028833&width=900"
  },
  {
    name: "Princess Anne",
    color: "pink",
    form: "Hardy shrub rose",
    scent: "Medium tea fragrance",
    price: "$35.00",
    badge: "Hardy",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/Princess_Anne_da.somerset-57_2.jpg?v=1775135647&width=900"
  },
  {
    name: "Kew Gardens",
    color: "white",
    form: "Single-flowered shrub",
    scent: "Light fragrance",
    price: "$35.00",
    badge: "Pollinator",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/Kew_Gardens_Nepeta__DSF7533_1.jpg?v=1776251893&width=900"
  },
  {
    name: "Scepter'd Isle",
    color: "pink",
    form: "English shrub rose",
    scent: "Myrrh fragrance",
    price: "$35.00",
    badge: "Classic",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/Scepter_d_Isle_-_190701_103_cropped_fb1e63d0-b42a-474a-811c-d9e4d9fe33e5.jpg?v=1774343260&width=900"
  },
  {
    name: "The Mayflower",
    color: "pink",
    form: "Repeat flowering shrub",
    scent: "Old rose fragrance",
    price: "$35.00",
    badge: "Repeat bloom",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/The_Mayflower__22_0705_139_823e66f6-d5b3-4f73-97b4-a1a2a91c1c89.jpg?v=1775810810&width=900"
  }
];

const careGuides = [
  {
    title: "How to plant roses in pots",
    text: "Choose a deep container, rich compost and a sunny position with steady watering.",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/DAR_Spring_Shoot_Planting-in-Pot_114317_2_b51f6b72-5c88-4d48-aaa5-f464a4858ac0.jpg?v=1776067273&width=700"
  },
  {
    title: "Spring feeding and mulching",
    text: "Feed as growth begins and mulch to lock in moisture through warm weather.",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/DAR_Spring_Shoot_Feeding_121116_1_8f666c65-82e6-46e2-b05d-1c0c205cac27.jpg?v=1773751913&width=700"
  },
  {
    title: "Pruning climbing roses",
    text: "Train main stems horizontally, then shorten side shoots to encourage flowering.",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/AM_climber_pruning_portrait_2x3_Mar25_125603_01_4_172f268b-08c4-496d-a13e-b952b595025f.jpg?v=1775637824&width=700"
  }
];

const articles = [
  {
    title: "The Cotswold Garden at Chelsea",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/DAR-ChelseaStand-May26-163753_3_a449ff76-b5b0-45bc-b8f5-0c1ef3e82bee.jpg?v=1779183570&width=850",
    text: "A celebration of planting texture, fragrance and rose-filled abundance."
  },
  {
    title: "Finding the right rose for your garden",
    image: "https://www.davidaustinroses.com/cdn/shop/files/302a374d5b152142b2a1e607c8cf2daf.jpg?v=1759325423&width=700",
    text: "Match flower color, growth habit and scent to the spaces you use most."
  },
  {
    title: "Common rose problems",
    image: "https://www.davidaustinroses.com/cdn/shop/articles/Powdery_mildew_pic_1_2_afef2ad8-db37-4a05-a0e3-9e9a6c9e8395.jpg?v=1777983511&width=700",
    text: "Spot early signs of mildew, aphids and stress before they slow growth."
  }
];

let cartCount = 0;

function renderProducts(filter = "all") {
  const grid = document.querySelector("#productGrid");
  const filtered = filter === "all" ? products : products.filter((product) => product.color === filter);

  grid.innerHTML = filtered
    .map(
      (product) => `
        <article class="product-card">
          <figure>
            <img src="${product.image}" alt="${product.name} rose">
            <span class="badge">${product.badge}</span>
          </figure>
          <div class="product-body">
            <h3>${product.name}</h3>
            <div class="product-meta">${product.form}</div>
            <div class="product-meta">${product.scent}</div>
            <div class="price-row">
              <strong>${product.price}</strong>
              <span>${product.color}</span>
            </div>
            <button class="add-button" data-product="${product.name}" type="button">Add to cart</button>
          </div>
        </article>
      `
    )
    .join("");
}

function renderCards(items, selector, className) {
  const grid = document.querySelector(selector);
  grid.innerHTML = items
    .map(
      (item) => `
        <article class="${className}">
          <img src="${item.image}" alt="${item.title}">
          <div>
            <h3>${item.title}</h3>
            <p>${item.text}</p>
          </div>
        </article>
      `
    )
    .join("");
}

function bindInteractions() {
  document.querySelector(".menu-toggle").addEventListener("click", (event) => {
    const button = event.currentTarget;
    const nav = document.querySelector(".main-nav");
    const isOpen = nav.classList.toggle("is-open");
    button.setAttribute("aria-expanded", String(isOpen));
  });

  document.querySelectorAll(".filter").forEach((button) => {
    button.addEventListener("click", () => {
      document.querySelectorAll(".filter").forEach((filter) => filter.classList.remove("is-active"));
      button.classList.add("is-active");
      renderProducts(button.dataset.filter);
    });
  });

  document.querySelector("#productGrid").addEventListener("click", (event) => {
    if (!event.target.matches(".add-button")) return;
    cartCount += 1;
    document.querySelector("#cartCount").textContent = cartCount;
    event.target.textContent = "Added";
    window.setTimeout(() => {
      event.target.textContent = "Add to cart";
    }, 1200);
  });

  document.querySelector("#newsletterForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const email = new FormData(event.currentTarget).get("email");
    document.querySelector("#formMessage").textContent = `Thanks. ${email} has been added to the local demo list.`;
    event.currentTarget.reset();
  });
}

renderProducts();
renderCards(careGuides, "#careGrid", "care-card");
renderCards(articles, "#articleGrid", "article-card");
bindInteractions();
