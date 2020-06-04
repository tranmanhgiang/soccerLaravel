<!-- Post model begin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tìm đối</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {{-- @if(count($errors) > 0)
                <script>
                    alert({{'Đăng thất bại!'}});
                </script>
            @endif --}}
            <form action="front/clubs/find" method="POST">
                @csrf
                <div class="form-group row ">
                    <div class="col-xs-6 col-md-6"> 
                        <label class="col-form-label">Ngày: <span class="bind">*</span></label>
                        <input type="date" class="form-control" name = "date">
                    </div> 
                    <div class="col-xs-6 col-md-6"> 
                        <label class="col-form-label">Giờ: <span class="bind">*</span></label>
                        <input type="time" class="form-control" name="time">
                    </div> 
                </div>
                <div class="form-group">
                    <label class="col-form-label">Tên sân(nếu có):</label>
                    <input type="text" class="form-control" name="stadium">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Kèo: <span class="bind">*</span></label>
                    <input type="text" class="form-control" name="lease">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Địa chỉ: </label>
                    <input type="text" class="form-control" name="address">
                </div>
            
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-send"></i> Đăng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Post model begin -->