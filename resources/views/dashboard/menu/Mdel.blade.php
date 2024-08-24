
<!-- model delete confirm category -->
<div class="modal fade" id="deleteMenu" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تنبيه هام !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('menu.delete') }}">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="mb-1">
                            <p>هل تريد بالفعل حذف هذا المنيو ؟</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger me-1 data-submit waves-effect waves-float waves-light">تأكيد</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>