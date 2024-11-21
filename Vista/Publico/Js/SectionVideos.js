function loadVideos(period) {
    const videoContent = document.getElementById('video-content');
    let videosHTML = '';

    if (period === 'periodo1') {
        videosHTML = `
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/mbtK9Khf9AU" frameborder="0" allowfullscreen></iframe>
                <h3>Video 1: Introducción a la Química</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/hzw_h87wL2E" frameborder="0" allowfullscreen></iframe>
                <h3>Video 2: La Materia y Sus Propiedades</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/8KM8ysFtEOU" frameborder="0" allowfullscreen></iframe>
                <h3>Video 3: Estructura Atómica</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/zodrbhLMFDY" frameborder="0" allowfullscreen></iframe>
                <h3>Video 4: Enlaces Químicos</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/PKS22hWZfKU" frameborder="0" allowfullscreen></iframe>
                <h3>Video 5: Reacciones Químicas</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/Dq40Vs0aTi8" frameborder="0" allowfullscreen></iframe>
                <h3>Video 6: Leyes de la Química</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/o5n-Ok8vdgE" frameborder="0" allowfullscreen></iframe>
                <h3>Video 7: Estequiometría</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/Bvfn6eUhUAc" frameborder="0" allowfullscreen></iframe>
                <h3>Video 8: Termodinámica Química</a></h3>
            </div>
        `;
    } else if (period === 'periodo2') {
        videosHTML = `
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/ducBHqyNjNg/ frameborder="0" allowfullscreen></iframe>
                <h3>Video 1: Propiedades de los Gases</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/ReiGO17SH4g" frameborder="0" allowfullscreen></iframe>
                <h3>Video 2: Soluciones y Concentraciones</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/DbJJsf2qsFM" frameborder="0" allowfullscreen></iframe>
                <h3>Video 3: Reacciones de Óxido-Reducción</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/GpcblwWnFWk" frameborder="0" allowfullscreen></iframe>
                <h3>Video 4: Equilibrio Químico</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/SmCVbb__SVE" frameborder="0" allowfullscreen></iframe>
                <h3>Video 5: Ácidos y Bases</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/Bvfn6eUhUAc" frameborder="0" allowfullscreen></iframe>
                <h3>Video 6: Termodinámica Química Avanzada</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/J0j61P_ok5Y" frameborder="0" allowfullscreen></iframe>
                <h3>Video 7: Cinética Química</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/vqGUvocEYAI" frameborder="0" allowfullscreen></iframe>
                <h3>Video 8: Química Orgánica Básica</a></h3>
            </div>
        `;
    } else if (period === 'periodo3') {
        videosHTML = `
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/F0LC1EdZY6s" frameborder="0" allowfullscreen></iframe>
                <h3>Video 1: Química de Polímeros</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/aHQzxYeCS7E" frameborder="0" allowfullscreen></iframe>
                <h3>Video 2: Compuestos Orgánicos</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/uIDA8HjrSM8" frameborder="0" allowfullscreen></iframe>
                <h3>Video 3: Reacciones Química Ambiental</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/Cw0LcuPgohg" frameborder="0" allowfullscreen></iframe>
                <h3>Video 4: Química en la Vida Cotidiana</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/GGHsuEtZAS0" frameborder="0" allowfullscreen></iframe>
                <h3>Video 5: Futuro de la Química</a></h3>
            </div>
        `;
    } else if (period === 'extras') {
        videosHTML = `
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/z11_ICGemu8" frameborder="0" allowfullscreen></iframe>
                <h3>Video 1: Experimentos Químicos Divertidos</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/pDh7-uP0iOo" frameborder="0" allowfullscreen></iframe>
                <h3>Video 2: La Historia de la Química</a></h3>
            </div>
            <div class="video-card">
                <iframe src="https://www.youtube.com/embed/knumN1z4uhg" frameborder="0" allowfullscreen></iframe>
                <h3>Video 3: Química en la Industria</a></h3>
        `;
    }

    videoContent.innerHTML = videosHTML;
}

window.onload = function() {
    loadVideos('periodo1');
}
