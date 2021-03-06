@section('uploader')
    <uploader path="{{ $path ?? '/' }}" label="{{ $label ?? 'Upload' }}" class="file-manager-module"></uploader>
@endsection

@push('scripts')
<script>{!! fm_asset('manifest', 'text') !!}</script>
<script src="{{ fm_asset('polyfills') }}"></script>
<script src="{{ fm_asset('uploader') }}"></script>
@endpush
