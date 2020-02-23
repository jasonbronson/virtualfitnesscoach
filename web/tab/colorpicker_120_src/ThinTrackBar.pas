unit ThinTrackBar;

interface

uses
  Windows, Messages, SysUtils, Classes, Graphics, Controls, Forms, Dialogs,
  ComCtrls, CommCtrl;

type
  TThinTrackBar = class(TTrackBar)
  private
    { Private declarations }
  protected
    { Protected declarations }
    procedure CreateParams(var Params: TCreateParams); override;
  public
    { Public declarations }
  published
    { Published declarations }
  end;

procedure Register;

implementation

procedure Register;
begin
  RegisterComponents('Win32', [TThinTrackBar]);
end;

procedure TThinTrackBar.CreateParams(var Params: TCreateParams);
begin
  inherited;
  Params.Style := Params.Style and not TBS_ENABLESELRANGE;
end;

end.
