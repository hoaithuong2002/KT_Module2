<div class="container">
    <h3 id="book-h3"> Thêm mặt hàng</h3>
    <form method="post" class="was-validated">
        <div class="form-group">
            <label for="uname">Tên hàng:</label>
            <input type="text" class="form-control" id="uname" placeholder="Name" name="name" required>
        </div>
        <div class="form-group">
            <label for="sel1">Loại hàng:</label>
            <select name="category" class="form-control" id="sel1">
                <option value="Phone">Phone</option>
                <option value="Tivi">Tivi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="uname">Giá:</label>
            <input type="text" class="form-control" id="uname" placeholder="Enter Price" name="price" required>
        </div>
        <div class="form-group">
            <label for="uname">Số lượng:</label>
            <input type="text" class="form-control" id="uname" placeholder="Number" name="number" required>

        </div>
        <div class="form-group">
            <label for="uname">Mô tả:</label>
            <input type="datetime-local" class="form-control" id="uname" name="date" required>
        </div>

        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-danger">Danger</button>
    </form>
</div>