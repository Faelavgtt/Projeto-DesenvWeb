import CardArtwork from "./components/cardComponent.js";

const infoCardArt = [
    {
        image: "caminho_para_imagem_sol_e_arcoiris.jpg", 
        name: "O Sol Amigo e o Arco-Íris",
        price: "65,00",
        desc: "Um desenho feliz com cores vibrantes feito com giz de cera, perfeito para o quarto!",
    },
    {
        image: "caminho_para_imagem_dinossauro_verde.png",
        name: "Dino-Amigão no Jardim",
        price: "79,90",
        desc: "Uma pintura de um dinossauro verde sorridente explorando um jardim de flores azuis.",
    },
    {
        image: "caminho_para_imagem_familia_de_gatos.jpg",
        name: "Os Gatos Baloeiros",
        price: "88,50",
        desc: "Três gatinhos fofos voando em balões de festa coloridos, pintura a dedo.",
    },
    {
        image: "caminho_para_imagem_castelo_de_princesa.svg",
        name: "Castelo de Jujuba da Princesa",
        price: "95,00",
        desc: "Desenho de fantasia com um castelo feito de doces e glitter, desenhado por uma criança de 5 anos.",
    },
];
const docTag = document.querySelector("#cards-container");

infoCardArt.forEach(item => {
    docTag.innerHTML += CardArtwork(item);
});