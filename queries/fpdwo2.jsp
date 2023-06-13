<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
<%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


<jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver" 
jdbcUrl="jdbc:mysql://localhost/fp_dwo_9?user=root&password=" catalogUri="/WEB-INF/queries/fpdwo2.xml">

select {[Measures].[Stok]} ON COLUMNS,
  {([Produk].[Semua Produk],[Waktu].[Semua Waktu])} ON ROWS
from [Jual]



</jp:mondrianQuery>





<c:set var="title01" scope="session">Final Project DWO (Rata Rata Jumlah Stok)</c:set>
