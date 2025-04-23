document.addEventListener('DOMContentLoaded',() => {
    const headerButton = document.getElementById('headerButton');
    const homeButton = document.getElementById('submitButton');
    // haederから検索されるとき　highとlowを受ける
    function headerSearch ()
    {
        const high = document.getElementById('headerHighPrice');
        const low = document.getElementById('headerLowPrice');
        const highVal = document.getElementById('high').value;
        const lowVal = document.getElementById('low').value;
        // homeのページのpriceに値が入力されている場合に値を収納する
        high.value = highVal;
        low.value = lowVal;
    }
    function homeSearch ()
    {
        const category = document.getElementById('homeCategory');
        const name = document.getElementById('homeName');
        const categoryVal = document.getElementById('headerCategory').value;
        const nameVal = document.getElementById('headerName').value;
        // haederにカテゴリ情報などが入力している場合に収納する
        category.value = categoryVal;
        name.value = nameVal;
    }
    headerButton.addEventListener('click',headerSearch);
    homeButton.addEventListener('click',homeSearch);
})
