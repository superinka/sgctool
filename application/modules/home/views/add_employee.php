                    <p><?php echo validation_errors(); ?><p>
                    <form class="form-horizontal form-label-left input_mask"  method="post" action="">

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" required="required" class="form-control has-feedback-left" name="nusername" id="nusername" value="<?php echo set_value("nusername")?>" placeholder="Tên đăng nhập">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" required="required" class="form-control" id="fullname" name="fullname" value="<?php echo set_value("fullname")?>" placeholder="Tên Đầy Đủ">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

<!--                       <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input type="password" required="required" class="form-control has-feedback-left" id="npassword" placeholder="Mật khẩu">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" required="required" class="form-control has-feedback-left" id="email" placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="skype" placeholder="Skype">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="facebook" placeholder="Facebook">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cấp nhân viên</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select class="form-control">
                            <option>Nhân viên</option>
                            <option>Trưởng Phòng</option>
                            <option>Ban giám đốc</option>
                            
                          </select>
                        </div>
                      </div>
                      <?php //pre($list_center) ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Quyền truy nhập</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple">
                          <?php 
                            foreach ($list_center as $r) {
                              ?>
                              <?php //echo count($r->child_room) ?>
                              <optgroup label="<?php echo $r['name']; ?>">
                                <?php foreach ($r['child_room'] as $x) { ?>

                                <option value="CA"><?php echo $x['name']?></option>
                                <?php } ?>
                              </optgroup>

                              <?php
                              
                            }
                          ?>
                          </select>
                        </div>
                      </div> -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Xoa</button>
                          <button type="submit" class="btn btn-success">Vao</button>
                        </div>
                      </div>

                    </form>