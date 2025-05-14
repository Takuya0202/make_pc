document.addEventListener('DOMContentLoaded',function(){
    // 画像のpathを取得して、imgのsrc属性を変更させる
    const fileImage = document.querySelector('.file-input');
    const previewImage = document.getElementById('preview');

    fileImage.addEventListener('change',(event)=>{
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })
})
