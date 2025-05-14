document.addEventListener('DOMContentLoaded',() => {
    const container = document.querySelector('.spinForm');
    const number = document.querySelector('.spinContainer input[type="number"]');
    const up = document.querySelector('.spinner-up');
    const down = document.querySelector('.spinner-down');
    const canSubmit = container.dataset.submit === "true";  // data-setで得られるものはstringなのでbooleanで判断するようにしとく
    const rejectZero = number.dataset.rejectZero === "true";

    // upボタンを入力されたとき
    up.addEventListener('click',() => {
        let current = parseInt(number.value);
        let step = parseInt(number.step) || 1; // stepなかったら1で固定
        number.value = current + step;
        if (canSubmit && number.form) {    // 自動送信できるフォームのみ
            number.form.submit();
        }
    });
    // downボタンを入力されたとき
    down.addEventListener('click',() => {
        let current = parseInt(number.value);
        let step = parseInt(number.step) || 1; // stepなかったら1で固定
        // rejectZeroがあるときは1までにする
        if (rejectZero) {
            number.value = Math.max(1,current - step);
        } else {
            number.value = current - step
        }
        if (canSubmit && number.form) {
            number.form.submit();
        }
    });
})
