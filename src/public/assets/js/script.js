import CardArtwork from "./components/cardComponent.js";

const container = document.querySelector("#cards-container");

async function carregarProdutos() {
    try {
        const response = await fetch("/Projeto-DesenvWeb/api-produtos");
        const produtos = await response.json();

        produtos.forEach((p) => {
            container.innerHTML += CardArtwork({
                image: p.image,
                name: p.name,
                price: p.price,
                desc: p.desc
            });
        });

    } catch (error) {
        console.error("Erro ao carregar produtos:", error);
    }
}

carregarProdutos();


