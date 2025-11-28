const CardArtwork = ({ image, name, price, desc }) => {
    return `
        <div class="card-artwork">
            <img src="${image}" alt="${name}" class="card-artwork-image"/>
            
            <div class="card-artwork-info">
                <h3 class="card-artwork-name">${name}</h3>
                <p class="card-artwork-price">R$ ${price}</p>
                <p class="card-artwork-description">${desc}</p>
            </div>
            
        </div>
    `;
};

export default CardArtwork;