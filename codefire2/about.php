<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");
?>
              <td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">
                  
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D8D8D8">
      <tr> 
                      
        <td width="100%" bgcolor="#C5E9FE" height="31"><font size="4" face="Arial, Helvetica, sans-serif"><b>          About CodeFire</b></font></td>
      </tr>
                    <tr> 
                      <td width="100%" align="left" valign="top" bgcolor="#FFFFFF"><p><strong>What's CodeFire?</strong><br /><small>
                        CodeFire is an online programming contest platform which supports C/C++. Its main objective is to create competition among programmers at Amrita School of Engineering, Bangalore. It is open to everyone to participate and it is running all time on the intranet.</p>
                        </small><p><strong>How it works?</strong><br />
                        <small>  CodeFire basically utilises power of PHP &amp; MySQL over XAMPP server employing DevCPP compiler and i/o redirection routines written in C with a little bit of VisualBasic.<br />
                        Basically the presentation of CodeFire which you get at http://ieee:81/codefire is written in HTML &amp; PHP. This interface lets you register, browse questions, upload/write solutions, edit solutions, change password, see other's profiles, etc. At the other side as you interact with CodeFire in your browser, the MySQL database stores all your details and statistics. Whenever you submit a solution, the judges get to see all your submissions and at one click your program is compiled, and outputs compared for correctness. If you get correct outputs at first try, you are eligible for total score, otherwise your score reduces as your trials increase. The compiler used is DevCPP (you can download it here). The stdin and stdout is redirected to files, for checking, so its best to use only standard C/C++ i/o functions.</p>
                        </small><p><strong>Who made it ?</strong><br />
                        <small>CodeFire has been developed by Abhishek Mishra (BG107CS004) and Mohammad Shaabi Amir (BG107CS***). Abhishek has basically done major work with website's interface and auto-compilation, Shaabi has worked with the core functioning of the site, ie. developing the whole framework in PHP &amp; MySQL. We welcome more suggestions and ideas to make CodeFire better for everyone.</p>
                        </small><p><strong>A few words...</strong><br />
                         <small> Well, we have seen a lot of people who know one or the other programming languages. We can see them all over India. You can find so many people taking C/C++ courses, yet another huge lot taking up Java courses. Do you think merely joining such courses or learning what is done in the B.Tech syllabus, is enough to solve real world problems ? You might have seen what a structure is in C/C++ but, you never came to see how it can help simplify complicated problems of reality. You might have learnt sorting algorithms, but how many time you have used it to do something other than solving the test paper ? What point I'm trying to bring out is that, something is lacking in the learning process. Its the 'Application' of what we have learnt. And CodeFire my friends, is the platform where you can come up, show off ur skills, compete with others, and learn more better ways to fulfill this gap. <br />
                          What CodeFire aims to do is to create a competitive environment for all those who would love to be better programmers of the future. CodeFire is open to all, there is no restriction of branch, year, age etc. <br />
                          In December 2007, we went for ACM-ICPC (International Collegiate Programming Contest) Asia round. Our teams got ranks 32 and 36 respectively. Overall 100 teams from all over India and Asia participated. We think we can do a lot better! And CodeFire is what is gonna help us create the very best teams out of our institution to be sent to such contests. <br />
                        </p></small>
                        <hr> </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#336699"><?= $copyr ?></td>
    </tr>
  </table>
</div>

</body>

</html>
