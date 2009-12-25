#include <iostream>
using namespace std;

int main (int argc, const char *argv[]) {
    char cc[] = "Dev-CppPortable\\App\\devcpp\\bin\\g++.exe ";
    if (argc>1) {
                char pfile[strlen (argv[1])];
                strcpy  (pfile,argv[1]);
                char ofile [strlen(pfile) + 8];
                strcpy (ofile,pfile); strcat (ofile, "_out.txt");
                
                char cfile [strlen(pfile) + 8];
                strcpy (cfile,pfile); strcat (cfile, "_cmp.txt");
                
                char ifile [strlen(pfile) + 8];
                strcpy (ifile,pfile); strcat (ifile, "_inp.txt");
                
                char efile [strlen(pfile) + 4];
                strcpy (efile,pfile); strcat (efile, ".exe");

                freopen (cfile,"w+",stderr);
                char cmd[300];
                strcpy (cmd,cc); strcat (cmd,pfile); strcat (cmd," -lm -o "); strcat (cmd,efile);
                system (cmd);
                fclose (stderr);
                
                freopen (ifile,"r+",stdin);
                freopen (ofile,"w+",stdout);
                strcpy (cmd,".\\"); strcat (cmd,efile);
                system (cmd);
                fclose (stdin);
                fclose (stdout);
                }
}
