<?php
include("processor/login_processor.php");
$customer_id = $_GET['customer_id'];
$invoice = $obj->invoice($customer_id);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>generate invoice</title>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<section id="invoice" class="invoice-box">
		<div id="" class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<?php foreach ($invoice as $key => $value) { ?>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<b>Bus Ticket</br> Reservation</b>
								</td>

								<td>
									Invoice #: 123<br />
									Created: <?php echo $value->created_at; ?><br />
									Due: 2 days after creation.
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Bus Ticket Reservation, Inc.<br />
									Anbaar<br />
									Peshawar, kpk
								</td>

								<td>
									INVOICE TO:<br />
									<b><?php echo $value->name; ?></b><br />
									<?php echo $value->contact; ?><br />
									<?php echo $value->email; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Full Information</td>

					<td>Check #</td>
				</tr>

				<tr class="">
					<td>Destination</td>

					<td><?php echo $value->destination; ?></td>
				</tr>
				<tr class="">
					<td>Seat No</td>

					<td><?php echo $value->seat; ?></td>
				</tr>
				<tr class="">
					<td>Departure Date</td>

					<td><?php echo $value->departure_date; ?></td>
				</tr>
				<tr class="">
					<td>Departure Time</td>

					<td><?php echo $value->departure_time; ?></td>
				</tr>

				<tr class="heading">
					<td>Ticket</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Ticket Price</td>

					<td>RS=50.00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: RS=50</td>
				</tr>
				<?php } ?>
			</table>
			<div>
			<button onclick="window.print()">PRINT</button>
			<button id="download">PDF</button>
		    </div>
		
		    </div>
			</section>

	</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</html>
        <script type="text/javascript">
			window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            var opt = {
                margin: 0.3,
                filename: 'invoice.pdf',
                image: { type: 'jpeg, png, webp', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
		</script>
