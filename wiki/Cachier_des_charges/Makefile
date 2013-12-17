all: presentation.eps
	epstopdf presentation.eps
	evince presentation.pdf
presentation.eps: presentation.dvi
	dvips -E presentation.dvi -o presentation.eps
presentation.dvi: presentation.tex
	latex presentation.tex
	latex presentation.tex

clean:
	rm presentation.eps presentation.dvi presentation.aux presentation.log presentation.idx presentation.toc presentation.nav presentation.out presentation.snm presentation.lof
mrproper: clean
	rm presentation.pdf
