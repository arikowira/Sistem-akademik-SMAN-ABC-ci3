<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Ardianta Pargo
 * @license			MIT License
 * @link			https://github.com/ardianta/codeigniter-dompdf
 */

use Dompdf\Dompdf;

class Pdf extends Dompdf{

	public function generate($html, $filename='', $paper='', $orientation='', $stream=TRUE)
	{
		$pdf = new Dompdf();

		$pdf->set_paper($paper, $orientation);
		$pdf->load_html($html);
		$pdf->render();

		if($stream){
			$pdf->stream($filename . ".pdf",[
				"Attachment" => 0
			]);
		}else{
			return $pdf->output();
		}
	}

	/**
	 * PDF filename
	 * @var String
	 */

	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function ci()
	{
		return get_instance();
	}

	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access	public
	 * @param	string	$view The view to load
	 * @param	array	$data The view data
	 * @return	void
	 */
	public function load_view($view, $data = array()){
		$html = $this->ci()->load->view($view, $data, TRUE);
		$this->load_html($html);

		// Render the PDF
		$this->render();

        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
	}
}