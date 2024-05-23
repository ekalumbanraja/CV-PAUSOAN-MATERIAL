<form action="{{ route('admin.delivery.updateStatus', $pengiriman->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="diproses" {{ $pengiriman->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="dikirim" {{ $pengiriman->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
            <option value="diterima" {{ $pengiriman->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="selesai" {{ $pengiriman->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
</form>

