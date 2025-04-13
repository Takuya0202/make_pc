document.addEventListener('DOMContentLoaded',() => {

    const list = document.getElementById('createList');
    const form = document.getElementById('listForm');
    const cancel = document.getElementById('cancel');

    list.addEventListener('click',() => {
        // フォーム作成の処理
        list.classList.add('hidden');
        form.classList.remove('hidden');
    })
    cancel.addEventListener('click',() => {
        // フォーム取り消しの処理
        list.classList.remove('hidden');
        form.classList.add('hidden');
    })
})
