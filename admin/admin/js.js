function loadSubcategories(selectedCategoryId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var subcategories = JSON.parse(xhr.responseText);
        // Lấy thẻ select
        var subcategorySelect = document.getElementById('subcategorySelect');

        // Xóa tất cả các option hiện tại (nếu có)
        subcategorySelect.innerHTML = '';
        // 'subcategories' giờ là một mảng có thể sử dụng trong JavaScript
        // console.log(subcategories);

        // Thực hiện các thao tác khác với mảng subcategories ở đây
        var defaultOption = document.createElement('option');
        defaultOption.value = '';
        subcategorySelect.appendChild(defaultOption);

        // Thêm các option từ mảng subcategories
        for (var i = 0; i < subcategories.length; i++) {
          var option = document.createElement('option');
          option.value = subcategories[i].id_danhmuc_con; // Sử dụng id hoặc giá trị phù hợp từ dữ liệu
          option.text = subcategories[i].ten_danhmuc_con; // Sử dụng tên hoặc giá trị phù hợp từ dữ liệu
          subcategorySelect.appendChild(option);
        }
      }
    };
    xhr.open('GET', 'san_pham/get_subcategories.php?categoryId=' + selectedCategoryId, true);
    xhr.send();
  }