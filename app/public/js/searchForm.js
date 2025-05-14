document.addEventListener('DOMContentLoaded',() => {
    const headerButton = document.getElementById('headerButton');
    const form = document.getElementById('searchForm');
    const sort = document.getElementById('sort');
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
    // headerからクリックまたは並び替えされた時
    headerButton.addEventListener('click',headerSearch);
    sort.addEventListener('change',() =>{
        homeSearch();
        form.submit();
    });
    // priceBar.jsから呼び出せるようにする
    window.homeSearch = homeSearch;
})
