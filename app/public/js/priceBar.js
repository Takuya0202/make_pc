document.addEventListener('DOMContentLoaded',() => {
    const lowSlider = document.getElementById('low');
    const highSlider = document.getElementById('high');
    const lowNum = document.getElementById('low-num');
    const highNum = document.getElementById('high-num');
    const rangeBar = document.getElementById('range-bar');
    const form = document.getElementById('searchForm');

    const minPrice = 0;
    const maxPrice = 300000;
    const step = 5000;

    let timer;

    function updateSlider(event) {
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
    // レンジバー変更後に自動送信する関数
    function submit(){
        clearTimeout(timer);
        timer = setTimeout(() => {
            // header情報をセット
            if (window.homeSearch) {
                window.homeSearch();
            }
            form.submit();
        },400)
    }

    // イベント設定
    [lowSlider,highSlider].forEach(slider => {
        slider.addEventListener('input',updateSlider);
        slider.addEventListener('input',submit);
    })

    // 初期設定
    updateSlider();
})
