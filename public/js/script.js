// Animation de neige tombant
const snowfallContainer = document.querySelector(".snowfall-container");
const snowflake = document.querySelector(".snowflake");

function appendSnowflake() {
    const newSnowflake = snowflake.cloneNode(true);

    // Chaque flocon a une taille différente
    newSnowflake.style.paddingLeft = Math.random() * 10 + 'px';
    newSnowflake.style.animationDuration = Math.random() * 5 + 3 + 's';
    newSnowflake.style.opacity = Math.random() * 1;

    snowfallContainer.append(newSnowflake);
}
const interval = setInterval(appendSnowflake, 80);
setTimeout(() => {
    clearInterval(interval);
}, 3000);