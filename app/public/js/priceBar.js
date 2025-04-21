document.addEventListener('DOMContentLoaded',() => {
    const lowSlider = document.getElementById('low');
    const highSlider = document.getElementById('high');
    const lowNum = document.getElementById('low-num');
    const highNum = document.getElementById('high-num');
    const rangeBar = document.getElementById('range-bar');

    const minPrice = 0;
    const maxPrice = 300000;
    const step = 5000;

    function updateSlider() {
        let lowVal = parseInt(lowSlider.value);
        let highVal = parseInt(highSlider.value);
        // low値とhigh値に下限、上限を持たせる low値は0~295000まで high値は5000~300000まで
        lowVal = Math.max(minPrice,Math.min(lowVal,maxPrice - step));
        highVal = Math.min(maxPrice,Math.max(highVal,minPrice + step));
        // highとlowの差が逆転するとき
        if (highVal - lowVal < step) {
            // low > highになろうとしているとき
            if (event.target === lowSlider) {
                lowVal = highVal - step;
            }
            // high < lowになろうとしているとき
            else {
                highVal = lowVal + step;
            }
        }

        // numberとrangeの更新
        lowSlider.value = lowVal;
        highSlider.value = highVal;
        lowNum.value = lowVal;
        highNum.value = highVal;

        // range-barのmaxとminの位置を取得
        const max = ( highVal / maxPrice ) * 100;
        const min = ( lowVal / maxPrice ) * 100;
        // range-barを更新
        rangeBar.style.left = min + '%';
        rangeBar.style.width = ( max - min ) + '%';
    }

    // イベント設定
    lowSlider.addEventListener('input', updateSlider);
    highSlider.addEventListener('input', updateSlider);

    // 初期設定
    updateSlider();
})
