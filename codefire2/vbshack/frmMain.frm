VERSION 5.00
Begin VB.Form frmMain 
   BorderStyle     =   4  'Fixed ToolWindow
   Caption         =   "VBSHack"
   ClientHeight    =   5460
   ClientLeft      =   45
   ClientTop       =   285
   ClientWidth     =   7740
   Icon            =   "frmMain.frx":0000
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   5460
   ScaleWidth      =   7740
   ShowInTaskbar   =   0   'False
   StartUpPosition =   3  'Windows Default
   Begin VB.Timer Timer3 
      Interval        =   200
      Left            =   3360
      Top             =   600
   End
   Begin VB.TextBox Text1 
      Height          =   3735
      Left            =   240
      MultiLine       =   -1  'True
      ScrollBars      =   2  'Vertical
      TabIndex        =   0
      Text            =   "frmMain.frx":0E42
      Top             =   1200
      Width           =   6975
   End
   Begin VB.Timer Timer1 
      Interval        =   5000
      Left            =   960
      Top             =   240
   End
End
Attribute VB_Name = "frmMain"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Sub Form_Load()
Me.Visible = False
'On Error Resume Next
'MsgBox App.Path & "\myshack.exe " & Command$
Shell App.Path & "\myshack.exe " & Command$, vbHide
Me.Hide
End Sub

Private Sub Timer1_Timer()
On Error Resume Next
    Open App.Path & "\" & Command$ & "_cmp.txt" For Append As #2
        Print #2, vbCrLf & "VBSHACK Terminate " & Command$ & ".exe [timeout!]"
    Close #2
    Killapp "myshack.exe"
    Killapp Command$ & ".exe"
    Timer1.Enabled = False

End Sub

Private Sub Timer3_Timer()
On Error Resume Next
Dim c As Long
c = VBA.FileLen(App.Path & "\" & Command$ & "_out.txt")

If (c > 1000) Or (KillerMod.FindProc("myshack.exe") = 0 And KillerMod.FindProc(Command$ & ".exe") = 0) Then
    Close ' closes the files
    Timer3.Enabled = False
    If (c > 1000) Then
        Killapp "myshack.exe"
        Killapp Command$ & ".exe"
        Kill App.Path & "\" & Command$ & "_out.txt" ' deletes the output file
        Open App.Path & "\" & Command$ & "_out.txt" For Output As #1
        Write #1, "Output too long!"
        Close
    End If
    
    End ' khud khushi
End If
End Sub

