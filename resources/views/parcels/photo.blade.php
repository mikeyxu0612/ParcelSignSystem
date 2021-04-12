<form method="post" action="{{ url('parcels/photos') }}" enctype="multipart/form-data">

    <label for="imgUpload1" class="block text-sm leading-5 font-medium text-gray-700">
        照片上傳
        <input type="file" id="imgUpload1" name = "imgUpload1">
        @method('patch')
        @csrf
    </label>
