import CardArtwork from "./components/cardComponent.js";

const infoCardArt = [
    {
        image: "/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg", 
        name: "O Sol Amigo e o Arco-Íris",
        price: "65,00",
        desc: "Um desenho feliz com cores vibrantes feito com giz de cera, perfeito para o quarto!",
    },
    {
        image: "/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg",
        name: "Dino-Amigão no Jardim",
        price: "79,90",
        desc: "Uma pintura de um dinossauro verde sorridente explorando um jardim de flores azuis.",
    },
    {
        image: "/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg",
        name: "Os Gatos Baloeiros",
        price: "88,50",
        desc: "Três gatinhos fofos voando em balões de festa coloridos, pintura a dedo.",
    },
    {
        image: "/Projeto-DesenvWeb/src/public/assets/img/heroimg.jpg",
        name: "Castelo de Jujuba da Princesa",
        price: "95,00",
        desc: "Desenho de fantasia com um castelo feito de doces e glitter, desenhado por uma criança de 5 anos.",
    },
];
const docTag = document.querySelector("#cards-container");

infoCardArt.forEach(item => {
    docTag.innerHTML += CardArtwork(item);
});