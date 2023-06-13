<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/fp_dwo_9?user=root&password=" catalogUri="/WEB-INF/queries/fpdwo.xml">

select {[Measures].[Pendapatan]} ON COLUMNS,
  {([Daerah].[Semua Daerah],[Waktu].[Semua Waktu],[Produk].[Semua Produk])} ON ROWS
from [Jual]


</jp:mondrianQuery>





<c:set var="title01" scope="session">Final Project DWO (Rata Rata Pendapatan Setiap Daerah)</c:set>
