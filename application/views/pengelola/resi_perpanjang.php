<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">description</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Ubah Pengujian</h4>
                <div class="row">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('pengelola/pengujian/update'); ?>">
                    <div class="col-md-5 col-sm-12">
                        <div class="row">
                            <input type="text" class="form-control" name="id_pengujian" value="<?php echo $data->id_pengujian; ?>" required readonly>
                            <label class="col-md-4 label-on-left"></label>
                            <div class="col-md-8">
                                <h3>Data Pengujian</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 label-on-left">Pilih Barang</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <input type="text" class="form-control" value="<?php echo $data->barang->petani->id . " | " .$data->barang->petani->nama . " | " . $data->barang->nama_barang; ?>" disabled>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 label-on-left">Hasil Pengujian</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" id="hsl_pengujian" name="hsl_pengujian" required>
                                        <option disabled>Pilih Hasil Pengujian</option>
                                        <option value="Diterima" <?php if($data->hsl_pengujian == 'Diterima'){ echo "selected";} ?> disabled>Diterima (Lolos)</option>
                                        <option value="Ditolak" <?php if($data->hsl_pengujian == 'Ditolak'){ echo "selected";} ?> disabled>Ditolak (Tidak Lolos)</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row" id="pilGudang" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>">
                            <label class="col-md-4 label-on-left">Gudang</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <select class="form-control select2" data-style="select-with-transition" id="id_gudang" name="id_gudang" required="" readonly>
                                        <option disabled>Pilih Gudang</option>
                                        <?php foreach ($gudang as $gudang): ?>
                                            <option value="<?php echo $gudang->id_gudang ?>"
                                                <?php if ($data->gudang) : ?>
                                                    <?php if ($gudang->id_gudang == $data->gudang->id_gudang){ echo 'selected'; } else { echo 'disabled'; } ?>
                                                <?php endif; ?>
                                                >
                                                <?php echo $gudang->id_gudang . " | " .$gudang->nama ;?>
                                            </option>
                                        <?php endforeach ;?>
                                    </select>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="pilKelasBrg" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Kelas Barang</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" id="kelas_barang" name="kelas_barang" required="">
                                        <option disabled>Pilih Kelas Barang</option>
                                        <?php
                                            $kelas_barang = [1,2,3];
                                            foreach ($kelas_barang as $kelas_barang) :
                                        ?>
                                         <option value="<?php echo $kelas_barang ?>"
                                            <?php if($data->hsl_pengujian == 'Diterima') : ?>
                                                <?php if($data->resi->first()->kelas_barang == $kelas_barang) { echo 'selected'; } ?>
                                            <?php endif; ?>
                                        >
                                            <?php echo $kelas_barang; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row" id="biaya_penyimpanan" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Biaya Penyimpanan</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="number" id="biaya_penyimpanan" name="biaya_penyimpanan" placeholder="contoh : 8000" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->last()->biaya_penyimpanan;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row harga" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left"></label>
                            <div class="col-md-8">
                                <h3>Harga</h3>
                            </div>
                        </div>
                        <div class="row harga" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Satuan Barang</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" id="satuan_barang" name="satuan_barang" required="">
                                        <option disabled>Pilih Satuan</option>
                                        <option value="kg" selected>Kilogram (kg)</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row harga" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Harga Barang (kg)</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" id="harga_barang" name="harga_barang" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->harga->harga_barang;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row resi" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left"></label>
                            <div class="col-md-8">
                                <h3>Resi</h3>
                            </div>
                        </div>
                        <div class="row resi" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">No Resi</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" id="no_resi" name="no_resi" placeholder="contoh : INV/10/2/3.2018" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->first()->no_resi;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row resi" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Masa Aktif</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" id="masa_aktif" name="masa_aktif" required="">
                                        <option disabled>Pilih Satuan</option>
                                        <?php
                                            $masa_aktif = [3,6,9,12,15,18];
                                            foreach ($masa_aktif as $masa_aktif) :
                                        ?>
                                            <option value="<?php echo $masa_aktif ?>"
                                                <?php if($data->hsl_pengujian == 'Diterima') : ?>
                                                    <?php if($data->resi->first()->masa_aktif == $masa_aktif) { echo 'selected'; } ?>
                                                <?php endif; ?>
                                            >
                                                <?php echo $masa_aktif.' Bulan' ;?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row polis" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left"></label>
                            <div class="col-md-8">
                                <h3>Polis</h3>
                            </div>
                        </div>
                        <div class="row polis" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">No Polis</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" id="no_polis" name="no_polis" placeholder="contoh : 407.22.44" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->first()->no_polis;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row polis" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Perusahaan Asuransi</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" id="polis_asuransi" name="polis_asuransi" placeholder="contoh : Asuransi Jasindo" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->first()->polis_asuransi;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row polis" style="visibility: <?php if($data->hsl_pengujian == 'Diterima'){ echo 'visible';} else { echo 'hidden'; } ?>;">
                            <label class="col-md-4 label-on-left">Periode Polis</label>
                            <div class="col-md-4">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control datepicker_tgl" type="text" id="polis_start" name="polis_start" placeholder="Mulai Polis" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->first()->polis_start;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control datepicker_tgl" type="text" id="polis_end" name="polis_end" placeholder="Akhir Polis" value="<?php if($data->hsl_pengujian == 'Diterima'){ echo $data->resi->first()->polis_end;} ?>" required="">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="row">
                            <label class="col-md-3 label-on-left"></label>
                            <div class="col-md-9">
                                <h3>Catatan Pengujian</h3>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Isi Catatan</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea class="form-control" name="isi_catatan" rows="18"><?php echo htmlspecialchars($data->catatan->isi_catatan); ?></textarea>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Status Catatan</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker" data-style="select-with-transition" name="status">
                                        <option disabled>Pilih Status</option>
                                        <option value="0" <?php ($data->catatan->status == 0 ? 'selected' : '') ?>>Pending </option>
                                        <option value="1" <?php ($data->catatan->status == 1 ? 'selected' : '') ?>>Published</option>
                                    </select>
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-button text-center">
                            <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
