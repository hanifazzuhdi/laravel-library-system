<!-- Modal -->
<div class="modal fade" id="modalBuku" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.books.create')}}" method="POST">
                    <div class="form-group">
                        <label> Penulis : </label>
                        <select name="author_id" class="form-control">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku : </label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Cover : </label>
                        <input type="text" class="form-control" placeholder="Via url aja ya..." name="cover">
                    </div>
                    <div class="form-group">
                        <label>ISBN : </label>
                        <input type="text" class="form-control" name="isbn">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Singkat : </label>
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah : </label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group d-flex justify-content-end my-3">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
