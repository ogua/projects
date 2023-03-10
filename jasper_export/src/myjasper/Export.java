package myjasper;

import java.io.BufferedOutputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.UnsupportedEncodingException;
import java.lang.reflect.Field;
import java.sql.Connection;
import java.util.Collection;
import java.util.Map;

import net.sf.jasperreports.engine.JRDataSource;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JRExporter;
import net.sf.jasperreports.engine.JRExporterParameter;
import net.sf.jasperreports.engine.JasperExportManager;
import net.sf.jasperreports.engine.JasperFillManager;
import net.sf.jasperreports.engine.JasperPrint;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.base.JRBaseReport;
import net.sf.jasperreports.engine.data.JRBeanCollectionDataSource;
import net.sf.jasperreports.engine.export.JRHtmlExporter;
import net.sf.jasperreports.engine.export.JRHtmlExporterParameter;
import net.sf.jasperreports.engine.export.JRRtfExporter;
import net.sf.jasperreports.engine.export.JRXlsExporter;
import net.sf.jasperreports.engine.export.JRXlsExporterParameter;
import net.sf.jasperreports.engine.export.ooxml.JRDocxExporter;
import net.sf.jasperreports.engine.export.ooxml.JRDocxExporterParameter;
import net.sf.jasperreports.engine.util.JRLoader;
public class Export {

	public static final String PRINT_TYPE = "print";
	public static final String PDF_TYPE = "pdf";
	public static final String EXCEL_TYPE = "excel";
	public static final String HTML_TYPE = "html";
	public static final String WORD_TYPE = "word";
	public static final String DOCX_TYPE = "docx";

	/**
	 * In accordance with the type of export file formats
	 * 
	 * @Param datas Collection of a map represent for each row.
	 * @Param type export File Type
	 * @Param jasperSource Jasper source file
	 * @param fileName file name of the export file (fulfill file name with extension)
	 * @param parameters additional parameters. like image path, header, ...
	 */
	public static void export(Collection datas, String type, InputStream jasperSource, String fileName, Map parameters) {
		try {
			JasperReport jasperReport = (JasperReport) JRLoader.loadObject(jasperSource);
			prepareReport(jasperReport, type);
			JRDataSource ds = new JRBeanCollectionDataSource(datas, false);
			JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, parameters, ds);

			if (EXCEL_TYPE.equals(type)) {
				exportExcel(jasperPrint, fileName);
			} else if (PDF_TYPE.equals(type)) {
				exportPdf(jasperPrint, fileName);
			} else if (HTML_TYPE.equals(type)) {
				exportHtml(jasperPrint, fileName);
			} else if (WORD_TYPE.equals(type)) {
				exportWord(jasperPrint, fileName);
			} else if (DOCX_TYPE.endsWith(type)) {
				exportDocx(jasperPrint, fileName);
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	public static void export(Connection con, String type, String jasperSource, String fileName, Map parameters){
		try {
			JasperReport jasperReport = (JasperReport) JRLoader.loadObject(jasperSource);
			prepareReport(jasperReport, type);
			
			JasperPrint jasperPrint = JasperFillManager.fillReport(jasperSource, parameters, con);

			if (EXCEL_TYPE.equals(type)) {
				exportExcel(jasperPrint, fileName);
			} else if (PDF_TYPE.equals(type)) {
				exportPdf(jasperPrint, fileName);
			} else if (HTML_TYPE.equals(type)) {
				exportHtml(jasperPrint, fileName);
			} else if (WORD_TYPE.equals(type)) {
				exportWord(jasperPrint, fileName);
			} else if (DOCX_TYPE.endsWith(type)) {
				exportDocx(jasperPrint, fileName);
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	static void exportDocx(JasperPrint jasperPrint, String fileName) {
		String realFileName;
		try {
			realFileName = new String(fileName.getBytes("GBK"), "ISO8859_1");

			OutputStream out = new BufferedOutputStream(new FileOutputStream(realFileName));
			JRExporter exporter = new JRDocxExporter();
			
			exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
			exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, out);
			exporter.setParameter(JRDocxExporterParameter.CHARACTER_ENCODING, "utf-8");
			exporter.setParameter(JRDocxExporterParameter.IGNORE_PAGE_MARGINS,  true);

			exporter.exportReport();
			out.flush();
			out.close();
		} catch (UnsupportedEncodingException e) {

			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (JRException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	private static void exportWord(JasperPrint jasperPrint, String fileName) {
		String realFileName;
		try {
			realFileName = new String(fileName.getBytes("GBK"), "ISO8859_1");

			OutputStream out = new BufferedOutputStream(new FileOutputStream(realFileName));
			JRExporter exporter = new JRRtfExporter();
			exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
			exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, out);

			exporter.exportReport();
			out.flush();
			out.close();
		} catch (UnsupportedEncodingException e) {

			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (JRException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	private static void exportHtml(JasperPrint jasperPrint, String fileName) {
		try {
			String realFileName = new String(fileName.getBytes("GBK"), "ISO8859_1");
			OutputStream out = new BufferedOutputStream(new FileOutputStream(realFileName));

			JRHtmlExporter exporter = new JRHtmlExporter();

			exporter.setParameter(JRHtmlExporterParameter.IS_USING_IMAGES_TO_ALIGN, Boolean.FALSE);
			exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
			exporter.setParameter(JRExporterParameter.CHARACTER_ENCODING, "UTF-8");
			exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, out);
			exporter.exportReport();

			out.flush();
			out.close();

		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		} catch (JRException e) {
			e.printStackTrace();
		}
	}

	private static void exportPdf(JasperPrint jasperPrint, String fileName) {
		try {
			String realFileName = new String(fileName.getBytes("GBK"), "ISO8859_1");
			OutputStream out = new BufferedOutputStream(new FileOutputStream(realFileName));
			JasperExportManager.exportReportToPdfStream(jasperPrint, out);

			out.flush();
			out.close();
		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (JRException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	private static void exportExcel(JasperPrint jasperPrint, String fileName) {

		try {
			String realFileName = new String(fileName.getBytes("GBK"), "ISO8859_1");
			OutputStream out = new BufferedOutputStream(new FileOutputStream(realFileName));

			JRXlsExporter exporter = new JRXlsExporter();
			exporter.setParameter(JRExporterParameter.JASPER_PRINT, jasperPrint);
			exporter.setParameter(JRExporterParameter.OUTPUT_STREAM, out);
			exporter.setParameter(JRXlsExporterParameter.IS_REMOVE_EMPTY_SPACE_BETWEEN_ROWS, Boolean.TRUE);
			exporter.setParameter(JRXlsExporterParameter.IS_ONE_PAGE_PER_SHEET, Boolean.FALSE);
			exporter.setParameter(JRXlsExporterParameter.IS_WHITE_PAGE_BACKGROUND, Boolean.FALSE);
			exporter.exportReport();

			out.flush();
			out.close();

		} catch (UnsupportedEncodingException e) {
			e.printStackTrace();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (JRException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}

	}

	public static void prepareReport(JasperReport jasperReport, String type) {
		/*
		 * If you are exporting the excel, you need to remove the margin around the
		 */
		if ("excel".equals(type))
			try {
				Field margin = JRBaseReport.class.getDeclaredField("leftMargin");
				margin.setAccessible(true);
				margin.setInt(jasperReport, 0);
				margin = JRBaseReport.class.getDeclaredField("topMargin");
				margin.setAccessible(true);
				margin.setInt(jasperReport, 0);
				margin = JRBaseReport.class.getDeclaredField("bottomMargin");
				margin.setAccessible(true);
				margin.setInt(jasperReport, 0);
				Field pageHeight = JRBaseReport.class.getDeclaredField("pageHeight");
				pageHeight.setAccessible(true);
				pageHeight.setInt(jasperReport, 2147483647);
			} catch (Exception exception) {
			}
	}

}
