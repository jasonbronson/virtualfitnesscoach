unit Color001;

{
This color picker for Notepad++ was inspired by

RGB color picker
http://delphi.about.com/library/weekly/aa012704a.htm
}

interface

uses
  Windows, Messages, SysUtils, Classes, Graphics, Controls, Forms, Dialogs,
  StdCtrls, ComCtrls, NppPlugin, ThinTrackBar, ExtCtrls, NppForms;

type
  TColorForm = class(TNppForm)
    TrackR: TThinTrackBar;
    TrackG: TThinTrackBar;
    TrackB: TThinTrackBar;
    EditR: TEdit;
    UpDownR: TUpDown;
    EditG: TEdit;
    UpDownG: TUpDown;
    EditB: TEdit;
    UpDownB: TUpDown;
    DecOutLbl: TLabel;
    PanelR: TPanel;
    RedBox: TPaintBox;
    PanelG: TPanel;
    GreenBox: TPaintBox;
    PanelB: TPanel;
    BlueBox: TPaintBox;
    HexOutEdit: TEdit;
    HexOutLbl: TLabel;
    DecOutEdit: TEdit;
    DelphiOutLbl: TLabel;
    DelphiOutEdit: TEdit;
    ColorDialog1: TColorDialog;
    ColorBtn: TButton;
    RadioGroup1: TRadioGroup;
    ColorPickBtn: TButton;
    Label1: TLabel;
    ColorEdt: TEdit;
    Label2: TLabel;
    InvertBtn: TButton;
    procedure TrackChange(Sender: TObject);
    procedure ColorBoxPaint(Sender: TObject);
    procedure ColEditChange(Sender: TObject);
    procedure OutBoxPaint(Sender: TObject);
    procedure ColorBtnClick(Sender: TObject);
    procedure ColorPickBtnClick(Sender: TObject);
    procedure InvertBtnClick(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
    BoxBuf: TBitmap;
    constructor Create(NppParent: TNppPlugin); overload;
    destructor Destroy; override;	
    procedure DrawGrad(BoxNum: integer);
  end;

var
  ColorForm: TColorForm;

implementation

{$R *.DFM}

procedure TColorForm.DrawGrad(BoxNum: integer);
var
  R, G, B: byte;
begin
  case BoxNum of
    1:
      begin
        G := TrackG.Position;
        B := TrackB.Position;

        with BoxBuf.Canvas do
        begin
          for R := 0 to 127 do
            Pixels[R, 0] := B shl 16 or G shl 8 or R shl 1;
          StretchBlt(RedBox.Canvas.Handle,
            0, 0, 128, RedBox.Height,
            Handle,
            0, 0,
            128, 1,
            SRCCOPY);
        end; // with BoxBuf.Canvas
      end; // case 1

    2:
      begin
        R := TrackR.Position;
        B := TrackB.Position;

        with BoxBuf.Canvas do
        begin
          for G := 0 to 127 do
            Pixels[G, 0] := B shl 16 or G shl 9 or R;
          StretchBlt(GreenBox.Canvas.Handle,
            0, 0, 128, RedBox.Height,
            Handle,
            0, 0,
            128, 1,
            SRCCOPY);
        end; // with BoxBuf.Canvas
      end; // case 2

    3:
      begin
        R := TrackR.Position;
        G := TrackG.Position;

        with BoxBuf.Canvas do
        begin
          for B := 0 to 127 do
            Pixels[B, 0] := B shl 17 or G shl 8 or R;
          StretchBlt(BlueBox.Canvas.Handle,
            0, 0, 128, RedBox.Height,
            Handle,
            0, 0,
            128, 1,
            SRCCOPY);
        end; // with BoxBuf.Canvas
      end; // case 3
  end; // case BoxNum of...
end;

procedure TColorForm.InvertBtnClick(Sender: TObject);
begin
   inherited;
   UpDownR.Position:= 255 - UpDownR.Position;
   UpDownG.Position:= 255 - UpDownG.Position;
   UpDownB.Position:= 255 - UpDownB.Position;
end;

procedure TColorForm.TrackChange(Sender: TObject);
var
  TempCol: Cardinal;
  TheSender: TThinTrackBar;
  i: integer;
begin
  TheSender := TThinTrackBar(Sender);

  for i := 1 to 3 do
    if TheSender.Tag <> i then DrawGrad(i);

  case TheSender.Tag of
    1: UpDownR.Position := TrackR.Position;
    2: UpDownG.Position := TrackG.Position;
    3: UpDownB.Position := TrackB.Position;
  end; // case Tag of

  // Swap blue and red bytes for normal HTML output
  TempCol := RGB(TrackB.Position, TrackG.Position, TrackR.Position);
  HexOutEdit.Text := '#' + inttohex(TempCol, 6);

  TempCol := RGB(TrackR.Position, TrackG.Position, TrackB.Position);
  DelphiOutEdit.Text:= '$00' + IntToHex(TempCol, 6);
  DecOutEdit.Text := inttostr(TempCol);

  // update color label
  ColorEdt.Color:= TempCol;
end;

constructor TColorForm.Create(NppParent: TNppPlugin);
begin
  inherited Create(NppParent);

  BoxBuf := TBitmap.Create;
  BoxBuf.Width := 128;
  BoxBuf.Height := 1;

  RadioGroup1.ItemIndex:= 0; { select HTML }
end;

destructor TColorForm.Destroy;
begin
  BoxBuf.Free;
  inherited;
end;

procedure TColorForm.ColorBoxPaint(Sender: TObject);
begin
  DoubleBuffered:= true;
end;

procedure TColorForm.ColorBtnClick(Sender: TObject);
var
   n: Cardinal;
begin
  if ColorDialog1.Execute then
     begin
        n:= ColorDialog1.Color;
        UpDownR.Position:= GetRvalue(n);
        UpDownG.Position:= GetGvalue(n);
        UpDownB.Position:= GetBvalue(n);
     end; // if color dialog
end;

procedure TColorForm.ColorPickBtnClick(Sender: TObject);
var
  ncolor: Cardinal;
begin
  inherited;
  ncolor:= ColorEdt.Color;
  case RadioGroup1.ItemIndex of
    0: Label1.Caption:= HexOutEdit.Text;
    1: Label1.Caption:= DelphiOutEdit.Text;
    2: Label1.Caption:= '0x00' + InttoHex(ncolor, 6);
    3: Label1.Caption:= '&' + InttoHex(ncolor, 6);
    4: Label1.Caption:= DecOutEdit.Text;
  else ShowMessage('I do not care') ;
  end; // case radio group1
end;

procedure TColorForm.ColEditChange(Sender: TObject);
begin
  case (Sender as TEdit).Tag of
    0: TrackR.Position := UpDownR.Position;
    1: TrackG.Position := UpDownG.Position;
    2: TrackB.Position := UpDownB.Position;
  end;
end;

procedure TColorForm.OutBoxPaint(Sender: TObject);
begin
  DrawGrad(TPaintbox(Sender).Tag);
end;
end.
