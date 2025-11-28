const CardArtwork = ({ image, name, price, desc }) => {
    return `
        <div class="card-artwork">
            <img src="${image}" alt="${name}" class="card-artwork-image"/>
            
        </div>
    `;
};

export default CardArtwork;
