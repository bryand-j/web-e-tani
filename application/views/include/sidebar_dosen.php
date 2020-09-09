<?php 
if ($this->session->userdata('lv')!='dosen')
{
    redirect('login');
}
if ($this->session->userdata('lv')=='')
{
    redirect('login');        
}
?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?=base_url()?>/assets/images/dosen/<?=$this->session->userdata('foto');?>" alt="..." class="avatar-img rounded-circle FotoUser">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span class="nUser1"><?= nama_depan($this->session->userdata('nama'));?></span>
                            
                            <span class="user-level"><?=$this->session->userdata('lv');?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?=base_url()?>dosen/profile">
                                    <span class="link-collapse">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>login/logout">
                                    <span class="link-collapse">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?=base_url()?>dosen/index">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fas fa-copy"></i>
                    </span>
                    <h4 class="text-section">Data</h4>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>dosen/khs">
                        <i class="fas fa-list-alt"></i>
                        <p>Nilai</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?=base_url()?>dosen/jadwal">
                        <i class="far fa-calendar-alt"></i>
                        <p>Jadwal Mengajar</p>
                    </a>
                </li>
                
            
                <li class="nav-item ">
                    <a href="<?=base_url()?>dosen/mahasiswa">
                        <i class="fas fa-user-graduate"></i>
                        <p>Mahasiswa Bimbingan</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->