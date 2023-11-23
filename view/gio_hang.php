 <!-- Modal -->
 <div class="modal modal_gio_hang" id="modal_gio_hang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Giỏ hàng</h1>
                 <button type="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-chevron-right"></i>
                 </button>
             </div>

             <div class="modal-body">
                 <div class="thong_bao">
                     <i class="fa-regular fa-truck-fast"></i><span>Miễn phí vận chuyển toàn bộ đơn hàng</span>
                 </div>
                 <div class="san_pham">
                     <?php foreach ($_SESSION['gio_hang'] as $value) : extract($value)?>
                         <div class="row box">
                             <div class="col-3 anh">
                                 <i class="fa-solid fa-xmark"></i><a href=""><img src="<?= $ten_img  ?>" alt="" /></a>
                             </div>
                             <div class="col-9 info">
                                 <a href="">
                                     <p><?= $ten_sp  ?></p>
                                 </a>
                                 <div class="thong_tin">
                                     <div class="mau">
                                         <img src="<?= $ten_img  ?>" alt="" />
                                     </div>
                                     <span><?= $id_mau  ?></span>|<span><?= $kt  ?></span>
                                 </div>

                                 <div class="gia">
                                     <h5>499.000 đ</h5>
                                     <div class="so_luong">
                                         <button class="bt1">
                                             <i class="fa-solid fa-minus"></i></button><input type="number" name="" id="" min="1" value="1" placeholder="Số lượng" /><button class="bt2">
                                             <i class="fa-solid fa-plus"></i>
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach ?>
                 </div>
             </div>
             <div class="modal-footer">
                 <div class="tien"><span class="tam_tinh">Tạm tính:</span><span class="gia">4.200.000 đ</span></div>
                 <div class="mua">
                     <a href=""><button>Thanh toán</button></a>
                 </div>
             </div>
         </div>
     </div>
 </div>