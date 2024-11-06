@php
    if(!isset($inputId)){
        $inputId = Illuminate\Support\Str::uuid();
    }

    if(!isset($fillValue)){
        $fillValue = null;
    }
@endphp
<div class="dropzone dropzone-default dz-clickable single_image_upload" id="{{$inputId}}">
    <div class="dropzone-msg dz-message needsclick">
        <div class="dz-message needsclick">
            <!--begin::Icon-->
            <div>
                <i class="bi bi-file-earmark-arrow-up text-primary fs-2x"></i>
            </div>
            <!--end::Icon-->
            <!--begin::Info-->
            <div class="ms-4">
                <span>Kéo hoặc chọn.</span>
                <span class="fs-7 fw-bold text-primary opacity-75">Max 10MB</span>
            </div>
            <!--end::Info-->
        </div>
    </div>
</div>
<div class="{{$inputId}}"></div>
@push('custom-scripts')
    <script>
        Dropzone.autoDiscover = false;
        window.addEventListener('DOMContentLoaded', function () {
            $(document).on('click','single_image_upload',function (){
            })
            $("#{{$inputId}}").dropzone({
                url: "{{route('storage.upload')}}", // Set the url for your upload script location
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 1,
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                init: function () {
                    var path = "{{$fillValue}}"
                    if (path) {
                        myDropzone = this;
                        const uuidMatch = path.split('/').pop().split('.').shift();
                        var mockFile = {name: path, size: 100, inputId: uuidMatch};

                        myDropzone.displayExistingFile(mockFile, "{{asset($fillValue)}}")

                        $(".{{$inputId}}").append(
                            `<input type="text" hidden id="${uuidMatch}" name="{{$inputName}}" value="${path}">`
                        )
                    }
                },
                accept: function (file, done) {
                    done()
                },
                success: function (file, res) {
                    const uuidMatch = res.split('/').pop().split('.').shift();
                    file.inputId = uuidMatch;
                    $(".{{$inputId}}").append(
                        `<input type="text" hidden id="${uuidMatch}" name="{{$inputName}}" value="${res}">`
                    )
                },
                removedfile: function (file) {
                    x = confirm('Bạn muốn xóa ảnh này?');
                    if (!x) return false;
                    $(`#${file.inputId}`).remove();

                    file.previewElement.remove();
                }
            });
        });
    </script>
@endpush