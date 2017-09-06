/**
 * 搜索
 */
function searchContent(action) {
	var kw = $("#kw").val();
	if (kw == null || kw == "") {
		return;
	}
	kw=kw.trim();
	var currentPage = $("#nextPage").val().split("-#-")[0];
	$.ajax( {
		type : "POST",
		url : action,
		data : "currentPage=" + currentPage + "&kw=" + encodeURIComponent(kw)
				+ "" + "&t=" + Math.random(),
		dataType : 'xml',
		success : function(msg) {
			// alert(msg);
		//清空之前搜索条目
		var arr=$(msg).find("li").children();
		if(arr.length>0){
		   clearItem();
		   appendDom(msg);
		}else{
		   clearItem();
		   $("#news_list").append("<div align='center'>未检索到关键字为："+kw+"的数据</div>");
		}
	
	},
	error : function(XMLHttpRequest, textStatus, errorThrown) {
		//alert(textStatus+":"+errorThrown);
		$("#loadMore").text("加载出错,网络异常...");
	}
	});
}

function clearItem() {
	$("#news_list").empty();
}

function appendDom(msg) {
	var html = "";
	$(msg).find("li").each(
			function(index, domEle) {
				var arr = $(domEle).children();
				html += "<li><a href='" + $(arr[0]).attr("href") + "'>"
						+ $(arr[0]).text().trim() + "</a><span>"
						+ $(arr[1]).text().trim()
						+ "</span><p class='clearfix'></p></li>";
			});
	$("#news_list").append(html);
	//获取下一页，和请求参数
	var _page = $(msg).find("input[id='nextURL']").attr("value");
	var parr = _page.split("-#-");
	if (parr[0] == "-1") {
		$("#nextPage").val("");
		$("#loadMore").attr("style", "display: none;");
	} else {
		$("#loadMore").attr("style", "display:");
		$("#nextPage").val(_page);
		$("#loadMore").text("点击加载更多...");
	}
}

function searchLoadMore(action) {
	var v = $("#nextPage").val();
	var parr = v.split("-#-");
	var currentPage = parr[0];
	var kw = parr[1]; //搜索参数
	$.ajax( {
		type : "POST",
		url : action,
		data : "currentPage=" + currentPage + "&kw=" + encodeURIComponent(kw)
				+ "" + "&t=" + Math.random(),
		dataType : 'xml',
		success : function(msg) {
			appendDom(msg)
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			//alert(textStatus+":"+errorThrown);
		$("#loadMore").text("加载出错,网络异常...");
	}
	});
}
