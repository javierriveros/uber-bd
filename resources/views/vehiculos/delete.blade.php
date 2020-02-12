<form action="{{ route('vehiculos.destroy', $id) }}" class="d-inline-block" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar vehículo">
        <i class="fas fa-trash"></i>
        <span class="d-none d-lg-inline-block">Eliminar vehículo</span>
    </button>
</form>
