<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= $title ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong><?= $title ?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php
                            echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
                            if(isset($error)){
                                echo '<div class="alert alert-warning">';
                                echo $error;
                                echo '</div>';
                            }

                            $atribut = array ('class' => 'form-horizontal');
                            //Open Form
                            echo form_open_multipart(base_url('siswa/tambah'),$atribut);
                            ?>
                                <div class="form-group"><label class="col-sm-2 control-label">NISN</label>

                                    <div class="col-sm-10"><input type="text" name="nisn" class="form-control" value="<?= set_value('nis') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Siswa</label>

                                    <div class="col-sm-10"><input type="text" name="nama_siswa" class="form-control" value="<?= set_value('nama_siswa') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kelas</label>

                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="id_kelas">
                                            <option>--Pilih Kelas--</option>
                                            <?php foreach ($kelas as $sm) : ?>
                                            <option value="<?= $sm->id_kelas ?>"><?= $sm->kelas ?></option>
                                            <?php endforeach;?>
                                        </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>

                                    <div class="col-sm-10"><input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Agama</label>

                                    <div class="col-sm-10"><input type="text" name="agama" class="form-control" value="<?= set_value('nama_siswa') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin </label>

                                    <div class="col-sm-10">
                                        <div>
                                            <label> <input type="radio" id="optionsRadios1" name="jenis_kelamin" value="Laki-Laki">Laki-Laki</label>
                                        </div>
                                        <div>
                                            <label> <input type="radio" id="optionsRadios2" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tempat Lahir</label>

                                    <div class="col-sm-10"><input type="text" name="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal Lahir</label>

                                    <div class="col-sm-10"><input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">No.HP Ortu</label>

                                    <div class="col-sm-10"><input type="text" name="hp_ortu" class="form-control" value="<?= set_value('hp_ortu') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">No.KK</label>

                                    <div class="col-sm-10"><input type="text" name="no_kk" class="form-control" value="<?= set_value('no_kk') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ayah</label>

                                    <div class="col-sm-10"><input type="text" name="nama_ayah" class="form-control" value="<?= set_value('nama_ayah') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ibu</label>

                                    <div class="col-sm-10"><input type="text" name="nama_ibu" class="form-control" value="<?= set_value('nama_ibu') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tahun Ajaran</label>

                                    <div class="col-sm-10"><input type="text" name="tahun_ajaran" class="form-control" value="<?= set_value('tahun_ajaran') ?>" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Foto</label>

                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span><input type="file" name="gambar1"/></span>
                                            <span class="fileinput-filename"></span>
                                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                        <input type="reset" name="reset" class="btn btn-white" value="Reset">
                                    </div>
                                </div>
                                <?php 
 		                        echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- Jasny -->
<script src="<?= base_url()?>asset/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- DROPZONE -->
<script src="<?= base_url()?>asset/js/plugins/dropzone/dropzone.js"></script>

<!-- CodeMirror -->
<script src="<?= base_url()?>asset/js/plugins/codemirror/codemirror.js"></script>
<script src="<?= base_url()?>asset/js/plugins/codemirror/mode/xml/xml.js"></script>


<!-- upload gambar dengan preview -->
<script>
    Dropzone.options.dropzoneForm = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
    };

    $(document).ready(function(){

        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
            lineNumbers: true,
            matchBrackets: true
        });

   });
</script>
<!-- end upload gambar dengan preview -->