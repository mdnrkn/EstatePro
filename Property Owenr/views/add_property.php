<?php include 'layout.php'; ?>
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2>Add New Property</h2>
    <form id="addPropForm" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label>Title</label>
            <input type="text" name="property_name" id="p_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            <span id="errName" style="color: red; font-size: 12px;"></span>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Price</label>
            <input type="number" name="property_price" id="p_price" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Description</label>
            <textarea name="description" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <button type="button" onclick="submitForm()" class="btn btn-primary">Submit Listing</button>
        <p id="msg" style="margin-top: 10px; font-weight: bold;"></p>
    </form>
</div>

<script>
function submitForm() {
    let name = document.getElementById('p_name').value;
    if(name == "") {
        document.getElementById('errName').innerText = "Property Name is required!";
        return;
    }

    let formData = new FormData(document.getElementById('addPropForm'));
    $.ajax({
        url: 'index.php?action=store_property',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let res = response; 
            if(res.status === 'success') {
                document.getElementById('msg').style.color = 'green';
                document.getElementById('msg').innerText = res.message;
                document.getElementById('addPropForm').reset();
            } else {
                document.getElementById('msg').style.color = 'red';
                document.getElementById('msg').innerText = res.message;
            }
        }
    });
}
</script>
</div></body></html>