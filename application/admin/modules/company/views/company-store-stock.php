    <div class="invoice-top-title-section">
        <h2>Company store stock</h2>        
    </div>

<style>
    .custom-border-table-container{
        background: none !important;
    }
    table.custom-border-table-style thead{
        background:#555;
        color:#fff;
    }
    table.custom-border-table-style thead th{
        background:#555;
        color:#fff;
    }
    table.custom-border-table-style th,table.custom-border-table-style td{
        border:1px solid #ddd !important;
    }
    .custom-border-table-container .rightbar-invoice-header-section{
        padding: 0 15px !important;
    }
    .quick-order-address-detail-container{
        padding-bottom: 0px !important;
    }
    .bold-text{
        font-weight: 600 !important;
    }
    .quick-order-address-detail-container ul li{
       
    }
    .right-quick-order-address-detail ul {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-bottom: 1px solid #d0d0d0;
        border-image: none;
        border-left: 1px solid #d0d0d0;
        border-radius: 5px;
        border-right: 1px solid #d0d0d0;
        padding-bottom: 10px;
    }
    .head-title-name {
        background: #6a6a6a none repeat scroll 0 0;
        border-radius: 4px 4px 0 0 !important;
        color: #fff !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        margin-bottom: 5px;
        padding: 6px 10px !important;
        text-align: right;
        text-transform: uppercase;
    }
    .quick-order-address-detail-container ul li {
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        color: #555;
        font-size: 13px;
        font-weight: normal;
        line-height: 20px;
        padding: 0 10px 3px;        
    }
    .quick-order-address-detail-container ul li:last-child {
        border-bottom: none;
    }
    .left-quick-order-address-detail ul li{
        border:none;
    }
</style>
    <div class="rightbar-invoice-full-section custom-border-table-container">
        <header class="panel-heading rightbar-invoice-header-section">
            <div class="row">                        
                <div class="col-sm-12 pad-left0">
                    <h3 style="margin: 20px 0 5px 0px;font-size: 18px; font-weight: 600; text-align: left; color: f27733;"><?= ucfirst( $company_detail['name'] ).':-'.ucfirst( $storeDetail['store_name'] ) ?></h3>
                </div>                
            </div>
        </header>
        <div class="rightbar-invoice-info-container">
            <div class="table-responsive text-center">
				<?php
					$attr = [];
					$attr[ 'id' ] = 'delete_store';
					$attr[ 'name' ] = 'delete_store';
					$hiddn[ 'store_id' ] = $storeDetail[ 'id' ];
					echo form_open(current_url(), $attr, $hiddn);
					if ($all_product_detail) {
				?>
					<table id="pagination-table" class="table table-bordered table-striped custom-border-table-style">
						<thead>
							<tr>
								<th width="50">S.no</th>
								<th class="leftalign">Code</th>
								<th width="150">Product Image</th>
								<th class="leftalign">Product Name</th>
								<th class="leftalign">Qty.</th>
								<th class="leftalign">Store To Transfer.</th>
							</tr>
						</thead>
						<tbody>
						<?php
							com_get_product_image('default_product.jpg', 50, 50);
							foreach ($all_product_detail as $stockIndex => $stockDet ) {
								$currrent_product = com_arrIndex($company_store_stock, $stockDet['product_sku'], []);
								$isStockAssignExist = com_arrIndex($company_store_user_issued_stock, $stockDet['product_sku'], 0);
								$issuedStock = [];
								if( $isStockAssignExist ){
									$issuedStock = $isStockAssignExist;
								}

								$isStockCarryFwdExist = com_arrIndex($company_store_carry_forward, $stockDet['product_sku'], 0);
								$cFwdStock = [];
								if( $isStockCarryFwdExist ){
									$cFwdStock = $isStockCarryFwdExist;
								}
								$product_image = $stockDet['product_image'];
						?>
							<tr>
								<td><?= ($stockIndex + 1); ?></td>
								<td class="leftalign"><?= $stockDet['product_sku']; ?></td>
								<td><img src="<?= com_get_product_image( $product_image, 50, 50); ?>" height="50px"/> </td>
								<td class="leftalign"><?= $stockDet['product_name']; ?></td>
								<td class="leftalign">
                                <?php
                                $company_store_product_debit = [];
                                $company_store_product_credit = [];
								if( isset( $company_stores_stock_exchange[ $stockDet['product_sku'].":0" ] ) ){
									$company_store_product_credit = $company_stores_stock_exchange[ $stockDet['product_sku'].":0" ][ 'ttl' ];
								}								
								if( isset( $company_stores_stock_exchange[ $stockDet['product_sku'].":1" ] ) ){
									$company_store_product_debit  = $company_stores_stock_exchange[ $stockDet['product_sku'].":1" ][ 'ttl' ];
								}                                
								$store_stock_exchange = 0;
								$store_debit_qty = intval( $company_store_product_debit );
								$store_credit_qty = intval( $company_store_product_credit );
								
								$store_stock_exchange = $store_credit_qty - $store_debit_qty;
								
								$sum_store_stock = com_arrIndex($currrent_product, 'ttl', 0 );
								$carry_fwd_stock = com_arrIndex($cFwdStock, 'ttl', 0 );
								$issued_store_stock = com_arrIndex($issuedStock, 'ttl', 0 );
								
								$simple = 'D-'.$store_debit_qty."<br/>".'C-'.$store_credit_qty."<br/>".'Ex-'.$store_stock_exchange
									."<br/>".'S-'.$sum_store_stock."<br/>".'Cf-'.$carry_fwd_stock."<br/>".'Iss-'.$issued_store_stock."<br/>";
								//echo $simple;
								$store_stock = $sum_store_stock + $carry_fwd_stock- $issued_store_stock
												+ $store_stock_exchange;
                                echo $store_stock;
                                ?>
								</td>
								<td>
									<?php									
										echo form_dropdown( 'transfer_stores['.$stockDet['product_sku'].']', $company_stores, '' );
									?>
								</td>
							</tr>
						<?php            
							}
						?>
						</tbody>
						<tfoot>
							<td colspan="4">
							</td>
							<td colspan="2">
								<?php									
									echo form_submit('delete_store', 'Delete Store', 'class="btn btn-danger"');
								?>
							</td>							
						</tfoot>
					</table>				
					<div class="clearfix"></div>
				<?php
				}
				echo form_close();
				?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
