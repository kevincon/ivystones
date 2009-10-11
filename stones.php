<?php

$page_title="Stones";

if(isset($_GET['lookup'])) {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if ((substr($url,-1)=='/') OR (substr($url, -1) == '\\')) {
		$url=substr($url,0,-1);
	}
	
	$stone = $_GET['stone']; 
	$url .= "/directory.php?stone=$stone";
	header("Location: $url");
	exit();
}

if(isset($_GET['log'])) {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	if ((substr($url,-1)=='/') OR (substr($url, -1) == '\\')) {
		$url=substr($url,0,-1);
	}
	
	$stone = $_GET['stone']; 
	$url .= "/logfind.php?stone=$stone";
	header("Location: $url");
	exit();
}
		
include ('header.php');
?>

<div id="content" style="text-align: center;">
	<form action="stones.php" method="get">
		<p>Choose a Stone:</p>
		<select name="stone" id="stones">
			<option>1873</option>
			<option>1874</option>
			<option>1875</option>
			<option>1876</option>
			<option>1877</option>
			<option>1878</option>
			<option>1879</option>
			<option>1880</option>
			<option>1881</option>
			<option>1882</option>
			<option>1883</option>
			<option>1884</option>
			<option>1885 Arts</option>
			<option>1885 Sciences</option>
			<option>1886</option>
			<option>1887</option>
			<option>1888</option>
			<option>1889</option>
			<option>1890</option>
			<option>1891</option>
			<option>1892</option>
			<option>1893</option>
			<option>1894</option>
			<option>1895</option>
			<option>1896</option>
			<option>1897</option>
			<option>1898</option>
			<option>1899</option>
			<option>1900</option>
			<option>1901</option>
			<option>1902</option>
			<option>1903</option>
			<option>1904</option>
			<option>1905</option>
			<option>1906</option>
			<option>1907</option>
			<option>1908</option>
			<option>1909</option>
			<option>1910</option>
			<option>1911</option>
			<option>1912</option>
			<option>1913</option>
			<option>1914</option>
			<option>1915</option>
			<option>1916</option>
			<option>1917</option>
			<option>1918</option>
			<option>1919</option>
			<option>1920</option>
			<option>1921</option>
			<option>1922</option>
			<option>1923</option>
			<option>1924</option>
			<option>1925</option>
			<option>1926 Men</option>
			<option>1926 Women</option>
			<option>1927 Men</option>
			<option>1927 Women</option>
			<option>1928 Men</option>
			<option>1928 Women</option>
			<option>1929 Men</option>
			<option>1929 Women</option>
			<option>1930 Men</option>
			<option>1930 Women</option>
			<option>1931 Men</option>
			<option>1931 Women</option>
			<option>1932 Men</option>
			<option>1932 Women</option>
			<option>1933 Men</option>
			<option>1933 Women</option>
			<option>1934 Men</option>
			<option>1934 Women</option>
			<option>1935 Men</option>
			<option>1935 Women</option>
			<option>1936 Men</option>
			<option>1936 Women</option>
			<option>1937 Men</option>
			<option>1937 Women</option>
			<option>1938 Men</option>
			<option>1938 Women</option>
			<option>1939 Men</option>
			<option>1939 Women</option>
			<option>1940 Men</option>
			<option>1940 Women</option>
			<option>1941 Men</option>
			<option>1941 Women</option>
			<option>1942 Men</option>
			<option>1942 Women</option>
			<option>1943 Men</option>
			<option>1943 Women</option>
			<option>1944 Men</option>
			<option>1944 Women</option>
			<option>1945 Men</option>
			<option>1945 Women</option>
			<option>1946 Men</option>
			<option>1946 Women</option>
			<option>1947 Men</option>
			<option>1947 Women</option>
			<option>1948 Men</option>
			<option>1948 Women</option>
			<option>1949 Men</option>
			<option>1949 Women</option>
			<option>1950 Men</option>
			<option>1950 Women</option>
			<option>1951 Men</option>
			<option>1951 Women</option>
			<option>1952 Men</option>
			<option>1952 Women</option>
			<option>1953 Men</option>
			<option>1953 Women</option>
			<option>1954 Men</option>
			<option>1954 Women</option>
			<option>1955 Men</option>
			<option>1955 Women</option>
			<option>1956 Men</option>
			<option>1956 Women</option>
			<option>1957 Men</option>
			<option>1957 Women</option>
			<option>1958 Men</option>
			<option>1958 Women</option>
			<option>1958 Women</option>
			<option>1959 Men</option>
			<option>1959 Women</option>
			<option>1960 Men</option>
			<option>1960 Women</option>
			<option>1961 Men</option>
			<option>1961 Women</option>
			<option>1962</option>
			<option>1963</option>
			<option>1964</option>
			<option>1965</option>
			<option>1966</option>
			<option>1967</option>
			<option>1968</option>
			<option>1969</option>
			<option>1970</option>
			<option>1971</option>
			<option>1972</option>
			<option>1973</option>
			<option>1974</option>
			<option>1975</option>
			<option>1976</option>
			<option>1977</option>
			<option>1978</option>
			<option>1979</option>
			<option>1980</option>
			<option>1981</option>
			<option>1982</option>
			<option>1983</option>
			<option>1984</option>
			<option>1985</option>
			<option>1986</option>
			<option>1987</option>
			<option>1988</option>
			<option>1989</option>
			<option>1990</option>
			<option>1991</option>
			<option>1992</option>
			<option>1993</option>
			<option>1994</option>
			<option>1995</option>
			<option>1996</option>
			<option>1997</option>
			<option>1998</option>
			<option>1999</option>
			<option>2000</option>
			<option>2001</option>
			<option>2002</option>
			<option>2003</option>
			<option>2004</option>
		</select>
		<p>Choose a task:</p>
		<div style="width: 320px; margin: auto;">
			<input type="submit" name="lookup" value="Lookup" class="submit" style="float: left;"  />
			<input type="submit" name="log" value="Log a Find" class="submit" style="float: right;" />
		</div>
	</form>
</body>
</html>