document.addEventListener('DOMContentLoaded', function () {
    // エリアトグルの処理
    const toggles = document.querySelectorAll('.area-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            const target = document.getElementById(this.dataset.target);
            if (target.style.display === 'none') {
                target.style.display = 'block';
            } else {
                target.style.display = 'none';
            }
        });
    });

    // リセットボタンの処理
    document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
        e.preventDefault();
        const reset = document.querySelectorAll('input[type="checkbox"]');
        reset.forEach(checkbox => {
            checkbox.checked = false;
        });
    });

    // 画像プレビュー機能の追加
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('preview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // テキストエリアの自動リサイズの処理
    const textarea = document.getElementById('comment');
    if (textarea) {
        textarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
});