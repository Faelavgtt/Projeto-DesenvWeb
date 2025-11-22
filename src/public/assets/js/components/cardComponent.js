const CardArtwork = ({ image, name, price, desc }) => {
    return `
        <div class="card-artwork">
            <img src="${image}" alt="${name}" class="card-artwork-image"/>
            <h3 class="card-artwork-name">${name}</h3>
            <p class="card-artwork-desc">${desc}</p>
            <p class="card-artwork-price">R$ ${price}</p>
            <button class="card-artwork-button">
                Comprar Desenho!
            </button>
        </div>
    `;
};

export default CardArtwork;
