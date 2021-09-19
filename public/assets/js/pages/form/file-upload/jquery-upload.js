"use strict";$(document).ready(function(){$("#templates").append(['\n\t\t<script id="template-upload" type="text/x-tmpl">\n\t\t\t{% for (var i=0, file; file=o.files[i]; i++) { %}\n\t\t\t\t<tr class="template-upload fade">\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<span class="preview"></span>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t{% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}\n\t\t\t\t\t\t\t<p class="name">{%=file.name%}</p>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t<strong class="error text-danger"></strong>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<p class="size">Processing...</p>\n\t\t\t\t\t\t<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 260px; ">\n\t\t\t\t\t\t{% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-primary edit" data-index="{%=i%}" disabled>\n\t\t\t\t\t\t\t\tEdit\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (!i && !o.options.autoUpload) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-primary start" disabled>\n\t\t\t\t\t\t\t\tStart\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (!i) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-danger cancel">\n\t\t\t\t\t\t\t\tCancel\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t{% } %}\n\t\t<\/script>','\n\t\t<script id="template-download" type="text/x-tmpl">\n\t\t\t{% for (var i=0, file; file=o.files[i]; i++) { %}\n\t\t\t\t<tr class="template-download fade">\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<span class="preview">\n\t\t\t\t\t\t\t{% if (file.thumbnailUrl) { %}\n\t\t\t\t\t\t\t\t<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>\n\t\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t</span>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t{% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}\n\t\t\t\t\t\t\t<p class="name">\n\t\t\t\t\t\t\t\t{% if (file.url) { %}\n\t\t\t\t\t\t\t\t\t<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?\'data-gallery\':\'\'%}>{%=file.name%}</a>\n\t\t\t\t\t\t\t\t{% } else { %}\n\t\t\t\t\t\t\t\t\t<span>{%=file.name%}</span>\n\t\t\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (file.error) { %}\n\t\t\t\t\t\t\t<div><span class="label label-danger">Error</span> {%=file.error%}</div>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<span class="size">{%=o.formatFileSize(file.size)%}</span>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 260px; ">\n\t\t\t\t\t\t{% if (file.deleteUrl) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields=\'{"withCredentials":true}\'{% } %}>\n\t\t\t\t\t\t\t\tDelete\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t\t<div class="custom-control custom-checkbox mx-2">\n\t\t\t\t\t\t\t\t<input type="checkbox" name="delete" value="1" class="custom-control-input toggle" id="delete-{%=i%}">\n\t\t\t\t\t\t\t\t<label class="custom-control-label" for="delete-{%=i%}">Select</label>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t{% } else { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-danger cancel">\n\t\t\t\t\t\t\t\tCancel\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t{% } %}\n\t\t<\/script>','\n\t\t<script id="custom-upload-template" type="text/x-tmpl">\n\t\t\t{% for (var i=0, file; file=o.files[i]; i++) { %}\n\t\t\t\t<tr class="template-upload fade">\n\t\t\t\t\t\t<td style="width: 35px">\n\t\t\t\t\t\t\t<div class="custom-control custom-checkbox">\n\t\t\t\t\t\t\t\t<input type="checkbox" name="delete" value="1" class="custom-control-input toggle" disabled id="delete-2-disabled-{%=i%}">\n\t\t\t\t\t\t\t\t<label class="custom-control-label" for="delete-2-disabled-{%=i%}"></label>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t\t<div class="mx-4 shadow preview" style="width: 50px; height: 50px; border: 1px solid #eeeeee; background-image: url(\'{%=file.thumbnailUrl%}\') ; ">\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t{% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}\n\t\t\t\t\t\t\t<p class="name">{%=file.name%}</p>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t<strong class="error text-danger"></strong>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<p class="size">Processing...</p>\n\t\t\t\t\t\t<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 260px; ">\n\t\t\t\t\t\t{% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-sm btn-primary edit" data-index="{%=i%}" disabled>\n\t\t\t\t\t\t\t\t<i class="fas fa-edit"></i> \n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (!i && !o.options.autoUpload) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-sm btn-primary start" disabled>\n\t\t\t\t\t\t\t\t<i class="fas fa-upload"></i> \n\t\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (!i) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-sm btn-danger cancel">\n\t\t\t\t\t\t\t\t<i class="fas fa-times"></i> \n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t{% } %}\n\t\t<\/script>','\n\t\t<script id="custom-download-template" type="text/x-tmpl">\n\t\t\t{% for (var i=0, file; file=o.files[i]; i++) { %}\n\t\t\t\t<tr class="template-download fade">\n\t\t\t\t\t\t<td style="width: 35px">\n\t\t\t\t\t\t\t<div class="custom-control custom-checkbox">\n\t\t\t\t\t\t\t\t<input type="checkbox" name="delete" value="1" class="custom-control-input toggle" id="delete-2-{%=i%}">\n\t\t\t\t\t\t\t\t<label class="custom-control-label" for="delete-2-{%=i%}"></label>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 70px">\n\t\t\t\t\t\t<span class="preview">\n\t\t\t\t\t\t\t{% if (file.thumbnailUrl) { %}\n\t\t\t\t\t\t\t\t\t<div class="mx-4 shadow" style="width: 50px; height: 50px; border: 1px solid #eeeeee; background-image: url(\'{%=file.thumbnailUrl%}\') ; ">\n\t\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t</span>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t{% if (window.innerWidth > 480 || !file.thumbnailUrl) { %}\n\t\t\t\t\t\t\t<p class="name m-0">\n\t\t\t\t\t\t\t\t<span>{%=file.name%}</span>\n\t\t\t\t\t\t\t</p>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t\t{% if (file.error) { %}\n\t\t\t\t\t\t\t<div><span class="label label-danger">Error</span> {%=file.error%}</div>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t\t<td>\n\t\t\t\t\t\t<span class="size">{%=o.formatFileSize(file.size)%}</span>\n\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 50px; ">\n\t\t\t\t\t\t\t{% if (file.url) { %}\n\t\t\t\t\t\t\t\t<a href="{%=file.url%}" target="_blank" class="btn btn-icon btn-sm btn-success" title="{%=file.name%}" download="{%=file.name%}" data-gallery>\n\t\t\t\t\t\t\t\t\t<i class="fas fa-download"></i> \n\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t{% } else { %}\n\t\t\t\t\t\t\t\t<button type="button" disabled class="btn btn-icon btn-sm btn-success">\n\t\t\t\t\t\t\t\t\t<i class="fas fa-download"></i> \n\t\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t\t<td style="width: 50px; ">\n\t\t\t\t\t\t{% if (file.deleteUrl) { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-sm btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields=\'{"withCredentials":true}\'{% } %}>\n\t\t\t\t\t\t\t\t<i class="fas fa-trash"></i> \n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } else { %}\n\t\t\t\t\t\t\t<button type="button" class="btn btn-icon btn-sm btn-danger cancel">\n\t\t\t\t\t\t\t\t<i class="fas fa-times"></i> \n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t{% } %}\n\t\t\t\t\t</td>\n\t\t\t\t</tr>\n\t\t\t{% } %}\n\t\t<\/script>'].join("\n"))}),$(document).ready(function(){$(function(){$("#fileupload").fileupload({url:"#",previewCrop:!0})}),$(function(){$("#fileupload-2").fileupload({url:"#"}),$("#fileupload-2").fileupload("option","redirect",window.location.href.replace(/\/[^/]*$/,"/cors/result.html?%s")),$("#fileupload-2").addClass("fileupload-processing"),$.ajax({url:$("#fileupload-2").fileupload("option","url"),dataType:"json",context:$("#fileupload-2")[0]}).always(function(){$(this).removeClass("fileupload-processing")}).done(function(t){$(this).fileupload("option","done").call(this,$.Event("done"),{result:t})})}),$(function(){$("#fileupload-3").fileupload({url:"#",uploadTemplateId:"custom-upload-template",downloadTemplateId:"custom-download-template",previewMinHeight:50,previewMinWidth:50,previewMaxHeight:50,previewMaxWidth:50,previewCrop:!0}),$("#fileupload-3").fileupload("option","redirect",window.location.href.replace(/\/[^/]*$/,"/cors/result.html?%s")),$("#fileupload-3").addClass("fileupload-processing"),$.ajax({url:$("#fileupload-3").fileupload("option","url"),dataType:"json",context:$("#fileupload-3")[0]}).always(function(){$(this).removeClass("fileupload-processing")}).done(function(t){$(this).fileupload("option","done").call(this,$.Event("done"),{result:t})})}),$("#toggle-3").on("change",function(){var t=!1;$(this).prop("checked")&&(t=!0),$(this).closest("table").find("tbody").find("input[type='checkbox']").prop("checked",t)})});