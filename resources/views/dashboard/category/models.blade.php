<!-- model add category -->
<div class="modal modal-slide-in fade" id="createCate" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <form method="POST" class="modal-content pt-0" action="{{ route('category.store') }}" autocomplete="off">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">إضافة تصنيف جديد</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label">التصنيف</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ البيانات</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </form>
    </div>
</div>

<!-- model edit category -->
<div class="modal modal-slide-in fade" id="editCate" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <form method="POST" class="modal-content pt-0" action="{{ route('category.update') }}">
            @csrf
            <input type="hidden" name="id" class="id">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">تعديل التصنيف</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="mb-1">
                    <label class="form-label">التصنيف</label>
                    <input type="text" class="form-control name" name="name">
                </div>
                <button type="submit" class="btn btn-success me-1 data-submit waves-effect waves-float waves-light">حفظ البيانات</button>
                <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </form>
    </div>
</div>

<!-- model delete confirm category -->
<div class="modal fade" id="deleteCate" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تنبيه هام !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('category.delete') }}">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="mb-1">
                            <p>هل تريد بالفعل حذف هذا القسم ؟</p>
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