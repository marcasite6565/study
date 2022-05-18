function onGeoOk(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${API_KEY}&units=metric&lang=kr`;
    fetch(url).then(response => response.json()).then(data => {
        const weather = document.querySelector("#weather span");
        weather.innerText = `현재 바깥은 ${data.weather[0].description}입니다.`;
    });
}

function onGeoError() {
    const weather = document.querySelector("#weather span");
    weather.innerText = `현재 위치를 확인할 수 없습니다.`;
}

navigator.geolocation.getCurrentPosition(onGeoOk, onGeoError);