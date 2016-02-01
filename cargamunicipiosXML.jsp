<%-- 
    Document   : muestramunicipios
    Created on : 14-dic-2015, 9:47:57
    Author     : alumno
--%>

<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/xml" pageEncoding="UTF-8"%>
<%
    String driver = "com.mysql.jdbc.Driver";
    String url = "jdbc:mysql://localhost/andalucia";

    Connection cn;
    Statement st;
    ResultSet rs;

    Class.forName(driver);
    cn = DriverManager.getConnection(url, "root", "newpass");
    st = cn.createStatement();

    String provincia=request.getParameter("provincias");
    //String provincia="41";
    
    String sql = "SELECT * FROM andalucia.municipios where codprov="+provincia;
    rs = st.executeQuery(sql);
    String cadena = "<municipios>";
    while (rs.next()) {
        cadena = cadena + "<municipio><codigo>" + rs.getString(1) + "</codigo><nombre>" + rs.getString(3) + "</nombre></municipio>";
    }
    cadena = cadena + "</municipios>";

    out.println(cadena);
%>
