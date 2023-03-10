package myjasper;



import java.io.FileNotFoundException;
import java.sql.Connection;
import java.sql.Date;
import java.sql.DriverManager;
import java.sql.Timestamp;
import java.util.HashMap;
import java.util.Map;

import net.sf.jasperreports.engine.JRException;

public class Main {

	public static void main(String[] args) throws FileNotFoundException, JRException {
		
//		final String JRXML = "report1.jrxml";
		final String JASPER	= "tmp.jasper";
		
		//compile to jasper file from jrxml file
//		compileToJasper(JRXML, JASPER);
		
		
		Map parameters = new HashMap();
		parameters.put("user_ID", "D02A56E1-1C7B-4D24-9BAF-19B4E333A424");
		parameters.put("start_Date", new Timestamp(new java.util.Date(2012, 11, 14).getTime()));
		parameters.put("end_Date",  new Timestamp(new java.util.Date().getTime()));
		String fileName = "tmp.xls";
		
		
		
//		//export using fields from map
//		File f = new File("tor_request.jasper");
//		FileInputStream jasperSource = new FileInputStream(f);
//		List<Object> datas = new ArrayList<Object>(); 
//		datas.add(new String(""));
//		Export.export(datas, Export.DOCX_TYPE, jasperSource, fileName, parameters);
		
		
		
		
		
		//export using field from database.
		try{
			Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver").newInstance();
			String connectionString = "jdbc:sqlserver://10.1.1.170\\sql2008;SelectMethod=cursor;DatabaseName=ezcm3170";
			Connection conn = DriverManager.getConnection(connectionString, "sa", "sa123");
			Export.export(conn, Export.EXCEL_TYPE, JASPER, fileName, parameters);
		}catch(Exception e){
			e.printStackTrace();
		}
		
		


		
		
		
		
		
//		//JasperPrint jasperPrint = JasperFillManager.fillReport(jasperReport, parameters);
//		
//		//Export.exportDocx(jasperPrint, "a.docx");
	}
	
	/*public static void compileToJasper(String jrxml, String jasper) throws JRException {
		
		File f = new File(jrxml);
		JasperDesign jasperDesign = JRXmlLoader.load(f);
		
		//compile to file
		JasperCompileManager.compileReportToFile(jasperDesign, jasper);
		
		//normal compile.
		//JasperReport jasperReport = JasperCompileManager.compileReport(jasperDesign);
	}
*/
}
